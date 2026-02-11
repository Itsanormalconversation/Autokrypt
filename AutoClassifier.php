<?php
namespace Autokrypt\PatternRecognition\Module;

class AutoClassifier {
    
    private $brain;
    private $evolution;
    
    public function __construct() {
        $this->brain = new \Autokrypt\PatternRecognition\Brain();
        $this->evolution = new \Autokrypt\PatternRecognition\Evolution();
        
        // Registriere ALLE Algorithmen
        $this->brain
            ->register(new \Autokrypt\PatternRecognition\Algorithm\Regex())
            ->register(new \Autokrypt\PatternRecognition\Algorithm\Levenshtein())
            ->register(new \Autokrypt\PatternRecognition\Algorithm\NaiveBayes())
            ->register(new \Autokrypt\PatternRecognition\Algorithm\KNN())
            ->register(new \Autokrypt\PatternRecognition\Algorithm\VectorSimilarity());
    }
    
    /**
     * DEINE FORMEL IN ACTION
     */
    public function classify(string $text): array {
        // 1️⃣ BRAIN entscheidet den besten Algorithmus
        $bestAlgo = $this->brain->decide([
            'text' => $text,
            'task' => 'categorization',
            'priority' => 'accuracy'
        ]);
        
        // 2️⃣ EVOLUTION verbessert ihn ständig
        if (rand(0, 100) < 5) { // 5% der Zeit evolvieren
            $bestAlgo = $this->evolution->evolve(5);
        }
        
        // 3️⃣ KLASSIFIZIERUNG
        $category = $bestAlgo->classify($text);
        $confidence = $bestAlgo->getConfidence();
        
        // 4️⃣ FEEDBACK fürs Gehirn (Lernen!)
        $this->brain->learn($text, $category, $confidence);
        
        return [
            'category' => $category,
            'confidence' => $confidence,
            'algorithm' => $bestAlgo->getName(),
            'evolved' => $bestAlgo->getGeneration()
        ];
    }
    
    /**
     * TRAINIERT das System mit deinen Daten
     */
    public function train(array $trainingData, int $epochs = 10) {
        for ($e = 0; $e < $epochs; $e++) {
            foreach ($trainingData as $sample) {
                $prediction = $this->classify($sample['text']);
                // Backpropagation / Feedback-Loop
                $this->brain->reinforce(
                    $sample['text'],
                    $sample['category'],
                    $prediction['category']
                );
            }
            
            echo "Epoch {$e}: Gehirn wird schlauer...\n";
        }
    }
}
?>