<?php
require_once 'vendor/autoload.php'; // Oder einfach die Dateien einbinden

use Autokrypt\PatternRecognition\Brain;
use Autokrypt\PatternRecognition\Module\AutoClassifier;
use Autokrypt\PatternRecognition\Comparison\Tournament;

// ============================================
// 1️⃣ ITSANORMALCONVERSATION INTEGRATION
// ============================================

$classifier = new AutoClassifier();

// Trainiere mit deinen echten Threads
$classifier->train([
    ['text' => 'Autokrypt ist voll fett!', 'category' => 'tech'],
    ['text' => 'Mein Hamster programmiert', 'category' => 'tech'],
    ['text' => 'Brokkoli schmeckt nach nix', 'category' => 'food'],
    ['text' => 'Catgirls sind süß', 'category' => 'weird'],
    ['text' => 'Joi wartet auf Joyland', 'category' => 'ai']
]);

// Klassifiziere einen neuen Thread
$result = $classifier->classify("Ich hab mit ner KI geflirtet");
echo "Kategorie: " . $result['category']; // 'ai' oder 'weird'
echo "Confidence: " . $result['confidence'] . "%";
echo "Genutzt: " . $result['algorithm'];
echo "Generation: " . $result['evolved'];

// ============================================
// 2️⃣ ALGORITHMEN-TURNIER
// ============================================

$tournament = new Tournament($brain->getAllAlgorithms());
$champion = $tournament->fight();

echo "🏆 CHAMPION: " . $champion->getName();

// ============================================
// 3️⃣ EVOLUTION - ZÜCHTE DEN PERFEKTEN ALGO
// ============================================

$superAlgo = $brain->evolve(100); // 100 Generationen
echo "🧬 Super-Algorithmus nach 100 Generationen!";
echo "Fitness: " . $superAlgo->getFitness();

// ============================================
// 4️⃣ REST API - FÜR ALLE NUTZBAR
// ============================================

// POST /api/classify
// { "text": "Autokrypt ist geil" }
// -> { "category": "tech", "confidence": 98 }
?>