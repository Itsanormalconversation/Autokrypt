<?php

/**
 * Autokrypt – Adaptive Pattern Recognition Framework
 * Core Formula Class (mit mathematischer Standardformel)
 *
 * f(x) = P(x) + ∫[a,b] R(t) * M(t,x) dt
 *
 * P(x)  = Primärmuster (direkte Merkmale)
 * R(t)  = Risiko-Funktion über t
 * M(t,x)= Musterinteraktion zwischen t und x
 */

class AutokryptFormula
{
    /**
     * Hauptanalysefunktion – universell nutzbar.
     */
    public function analyze($x): float
    {
        // 1. Primärmuster berechnen
        $P = $this->primaryPattern($x);

        // 2. Integralteil berechnen
        $integral = $this->integrate(function($t) use ($x) {
            return $this->riskFunction($t) * $this->interaction($t, $x);
        }, 0, 1); // Standardbereich [0,1]

        // 3. Formel anwenden
        $result = $P + $integral;

        // 4. Score normalisieren
        return $this->normalizeScore($result);
    }


    /**
     * P(x) – Primärmuster
     * Hier extrahierst du direkte Merkmale aus x.
     */
    private function primaryPattern($x): float
    {
        if (is_string($x)) {
            return strlen($x) * 0.5;
        }

        if (is_array($x)) {
            return count($x) * 0.3;
        }

        return 1.0;
    }


    /**
     * R(t) – Risiko-Funktion
     * Kann später modulabhängig überschrieben werden.
     */
    private function riskFunction(float $t): float
    {
        return sin($t * 3.14) + 1; // immer positiv
    }


    /**
     * M(t,x) – Musterinteraktion
     * Wie stark beeinflusst t das Muster x?
     */
    private function interaction(float $t, $x): float
    {
        if (is_string($x)) {
            return (substr_count($x, 'a') + 1) * $t;
        }

        if (is_array($x)) {
            return (count(array_unique($x)) + 1) * $t;
        }

        return $t;
    }


    /**
     * Numerische Integration (Trapezregel)
     */
    private function integrate(callable $func, float $a, float $b, int $steps = 100): float
    {
        $h = ($b - $a) / $steps;
        $sum = 0.0;

        for ($i = 0; $i < $steps; $i++) {
            $t1 = $a + $i * $h;
            $t2 = $a + ($i + 1) * $h;
            $sum += 0.5 * ($func($t1) + $func($t2)) * $h;
        }

        return $sum;
    }


    /**
     * Normalisiert das Ergebnis auf 0–100.
     */
    private function normalizeScore(float $value): float
    {
        return max(0, min(100, $value));
    }
}

