<?php

require_once __DIR__ . '/AutokryptModule.php';

class BehaviorModule extends AutokryptModule
{
    /**
     * $input = [
     *   'click_intervals' => [120, 135, 128, 500, 122, ...], // ms
     *   'mouse_speed'     => [0.4, 0.6, 0.5, 3.2, ...],      // relative
     *   'reaction_times'  => [240, 260, 255, 800, ...]       // ms
     * ]
     */
    public function analyze($input): array
    {
        // Rohdaten in ein Muster packen
        $pattern = $this->buildPatternVector($input);

        // Autokrypt-Formel anwenden
        $score = $this->formula->analyze($pattern);

        return [
            'score' => $score,
            'risk'  => $this->interpretRisk($score)
        ];
    }

    private function buildPatternVector(array $input): array
    {
        $vector = [];

        // Varianz & Ausreißer als Kernindikatoren
        if (isset($input['click_intervals'])) {
            $vector[] = $this->variance($input['click_intervals']);
            $vector[] = $this->outlierRatio($input['click_intervals']);
        }

        if (isset($input['mouse_speed'])) {
            $vector[] = $this->variance($input['mouse_speed']);
            $vector[] = $this->outlierRatio($input['mouse_speed']);
        }

        if (isset($input['reaction_times'])) {
            $vector[] = $this->variance($input['reaction_times']);
            $vector[] = $this->outlierRatio($input['reaction_times']);
        }

        return $vector;
    }

    private function variance(array $values): float
    {
        if (count($values) < 2) return 0.0;

        $mean = array_sum($values) / count($values);
        $sum = 0.0;

        foreach ($values as $v) {
            $sum += ($v - $mean) ** 2;
        }

        return $sum / (count($values) - 1);
    }

    private function outlierRatio(array $values): float
    {
        if (count($values) < 2) return 0.0;

        sort($values);
        $q1 = $values[(int) floor(count($values) * 0.25)];
        $q3 = $values[(int) floor(count($values) * 0.75)];
        $iqr = $q3 - $q1;

        if ($iqr == 0) return 0.0;

        $lower = $q1 - 1.5 * $iqr;
        $upper = $q3 + 1.5 * $iqr;

        $outliers = 0;
        foreach ($values as $v) {
            if ($v < lower || $v > $upper) {
                $outliers++;
            }
        }

        return $outliers / count($values);
    }

    private function interpretRisk(float $score): string
    {
        return match (true) {
            $score < 20 => 'Menschlich / unkritisch',
            $score < 50 => 'leicht auffällig',
            $score < 75 => 'verdächtig',
            default     => 'hohe Bot-/Cheat-Wahrscheinlichkeit'
        };
    }
}
