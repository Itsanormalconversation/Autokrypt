# AUTOKRYPT – Adaptive Pattern Recognition Framework

Autokrypt ist ein modulares Framework zur Mustererkennung, Risikoanalyse und Anomalie‑Detektion.  
Es basiert auf einer flexiblen, gewichteten Formel, die logische Strukturen in Daten erkennt und bewertet.  
Das Framework ist universell einsetzbar – von Cyber‑Security bis hin zu Verhaltensanalyse‑Systemen.

---

## 🚀 Features

- **Adaptive Mustererkennung**  
  Analysiert Datenstrukturen, Verhalten, Sequenzen und Muster.

- **Risiko‑Scoring**  
  Bewertet Abweichungen und erzeugt einen Risiko‑Score zwischen „unauffällig“ und „kritisch“.

- **Modularer Aufbau**  
  Eigene Module können einfach hinzugefügt werden (z. B. Phishing‑Scanner, Log‑Analyzer, Bot‑Detector).

- **Universell einsetzbar**  
  Beispiele:
  - Anti‑Phishing
  - Log‑Analyse
  - Bot‑Erkennung
  - Anomaly Detection
  - theoretisch: Verhaltens‑Anti‑Cheat

- **Leicht integrierbar**  
  PHP‑basiert, keine externen Abhängigkeiten.

---

## 🧠 Die Autokrypt‑Formel (Konzept)

Die Formel bewertet Muster anhand von:

- **logischen Strukturen**
- **Wiederholungen**
- **Abweichungen**
- **Gewichtungen**
- **Risiko‑Faktoren**

Das Ergebnis ist ein **Score**, der beschreibt, wie „natürlich“ oder „unnatürlich“ ein Muster ist.

Beispielhafte Bewertung:

- 0–20 → unkritisch  
- 20–50 → auffällig  
- 50–80 → verdächtig  
- 80–100 → kritisch  

Die Formel ist flexibel und kann für verschiedene Datenarten angepasst werden.

---

## 📁 Projektstruktur

/autokrypt
├── src/
│   ├── core/              # Kernlogik der Mustererkennung
│   ├── modules/           # Erweiterbare Module (Phishing, Logs, etc.)
│   └── web/               # Web-Integration (optional)
├── examples/              # Beispielanwendungen
├── docs/                  # Dokumentation
├── README.md
└── LICENSE



---

## 🧩 Beispiel: Nutzung der Formel

```php
require_once 'src/core/AutokryptFormula.php';

$formula = new AutokryptFormula();
$score = $formula->analyze($inputData);

echo "Autokrypt Score: " . $score;



🏢 Commercial Licensing (für README.md)
🔒 Kommerzielle Nutzung von Autokrypt
Autokrypt ist ein „Dual‑Licensed Framework“.
Das bedeutet:

Nicht‑kommerzielle Nutzung → kostenlos

Kommerzielle Nutzung → Lizenz erforderlich

Die Autokrypt‑Formel ist geistiges Eigentum des Autors und darf in kommerziellen Produkten nur mit gültiger Lizenz verwendet werden.

💼 Was gilt als kommerzielle Nutzung?
Kommerzielle Nutzung umfasst unter anderem:

Integration in ein kommerzielles Spiel

Nutzung in Anti‑Cheat‑Systemen, die verkauft oder lizenziert werden

Nutzung in Software, die Einnahmen generiert

Nutzung in Firmen‑ oder Enterprise‑Umgebungen

Nutzung in bezahlten Services

Nutzung in Produkten, die monetarisiert werden (z. B. Abos, Lizenzen, DLCs, Premium‑Features)

Wenn ein Projekt Geld verdient, fällt es unter kommerzielle Nutzung.

🧪 Was ist kostenlos?
Folgende Nutzung ist immer kostenlos:

private Projekte

Hobby‑Projekte

Forschung & Bildung

Open‑Source‑Experimente

Tests, Analysen, Proof‑of‑Concepts

nicht‑kommerzielle Tools

Du darfst Autokrypt frei ausprobieren, erweitern und testen – solange kein Geld fließt.

📬 Wie erhalte ich eine kommerzielle Lizenz?
Für eine kommerzielle Lizenz kontaktiere bitte:

📧 corneliusgaus1996@gmail.com

Bitte gib folgende Informationen an:

Name des Projekts

Art der Nutzung

Geschätzte Nutzerzahl / Reichweite

Einmalige Lizenz oder Umsatzbeteiligung gewünscht

Du erhältst dann ein individuelles Angebot.

📜 Lizenzmodell
Autokrypt verwendet ein Dual‑License‑Modell:

Autokrypt License (Non‑Commercial) → Standard, kostenlos

Autokrypt Commercial License → erforderlich für kommerzielle Nutzung

Die Formel, der Code und alle Module bleiben geistiges Eigentum des Autors.

🤝 Warum dieses Modell?
Autokrypt ist ein innovatives Framework mit einer eigenen mathematischen Formel.
Das Lizenzmodell ermöglicht:

freie Nutzung für die Community

Feedback, Tests und Weiterentwicklung

gleichzeitig Schutz vor kommerzieller Ausbeutung

und faire Beteiligung des Autors bei kommerziellem Einsatz

So bleibt Autokrypt offen – aber nicht schutzlos.
