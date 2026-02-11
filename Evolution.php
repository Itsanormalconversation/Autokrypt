<?php
namespace Autokrypt\PatternRecognition;

class Evolution {
    
    /**
     * KREUZT zwei Algorithmen zu einem Kind
     */
    public function crossover(Algorithm $a, Algorithm $b): Algorithm {
        $child = new HybridAlgorithm();
        
        // Nimm die besten Eigenschaften von beiden
        $child->setPatternMatcher(
            rand(0, 1) 
                ? $a->getPatternMatcher() 
                : $b->getPatternMatcher()
        );
        
        // Mische Parameter
        $paramsA = $a->getParameters();
        $paramsB = $b->getParameters();
        
        foreach ($paramsA as $key => $value) {
            $child->setParameter(
                $key,
                ($value + $paramsB[$key]) / 2 + $this->randomMutation()
            );
        }
        
        return $child;
    }
    
    /**
     * MUTIERT einen Algorithmus (zufällige Verbesserungen)
     */
    public function mutate(Algorithm $algo): Algorithm {
        $mutant = clone $algo;
        
        // Kleine zufällige Änderungen
        foreach ($algo->getParameters() as $key => $value) {
            if (rand(0, 100) < 15) { // 15% Mutationsrate
                $mutant->setParameter(
                    $key,
                    $value * (1 + (rand(-10, 10) / 100))
                );
            }
        }
        
        return $mutant;
    }
    
    /**
     * SELEKTION: Überleben der Stärksten
     */
    public function selectFittest(array $population, int $keepCount): array {
        usort($population, function($a, $b) {
            return $b->getFitness() <=> $a->getFitness();
        });
        
        return array_slice($population, 0, $keepCount);
    }
}
?>