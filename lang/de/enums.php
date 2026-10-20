<?php

use App\Enums\JobCategories;
use App\Enums\JobDurationTypesEnum;
use App\Enums\JobSettingTypesEnum;

return [
    'job_categories' => [
        JobCategories::CONSTRUCTION_HELPER->value => 'Bau',
        JobCategories::MOVING_HELPER->value => 'Umzug',
        JobCategories::DECLUTTER_HELPER->value => 'Entrümpelung',
        JobCategories::EVENT_HELPER->value => 'Veranstaltung',
        JobCategories::LOGISTICS_HELPER->value => 'Logistik',
        JobCategories::OFFICE_HELPER->value => 'Büro',
        JobCategories::TUTOR_HELPER->value => 'Nachhilfe',
        JobCategories::IT_HELPER->value => 'IT',
        JobCategories::BABYSITTER_HELPER->value => 'Babysitter' ,
        JobCategories::DRIVER_HELPER->value => 'Fahrer',
    ],
    'duration_types' => [
        JobDurationTypesEnum::INDEFINITE->value => 'Unbefristet',
        JobDurationTypesEnum::WEEKS->value => '1-4 Wochen',
        JobDurationTypesEnum::MONTH1->value => '1 Monat',
        JobDurationTypesEnum::MONTH2->value => '2 Monate',
        JobDurationTypesEnum::MONTH3->value => '3-5 Monate',
        JobDurationTypesEnum::MONTH6->value => '6 Monate',
        JobDurationTypesEnum::YEAR1->value => '1 Jahr',
        JobDurationTypesEnum::YEAR2->value => '2 Jahre',
        JobDurationTypesEnum::YEAR3->value => '3 Jahre',
    ],
    'settting_types' => [
        JobSettingTypesEnum::FULL_TIME->value => 'Vollzeit',
        JobSettingTypesEnum::PART_TIME->value => 'Teilzeit',
        JobSettingTypesEnum::MINI_JOB->value => 'Minijob',
    ],
    'expectations' => [
        JobCategories::CONSTRUCTION_HELPER->value => "
    * Vorherige Erfahrung im Baugewerbe,
    * Körperliche Fitness,
    * Zuverlässigkeit und Pünktlichkeit,
    * Sicherheitsbewusstsein,
    * Teamfähigkeit,
    * Sicherheitsschuhe und Arbeitskleidung,
    * Führerschein,
    * Fähigkeit, schwere Gegenstände zu heben",

        JobCategories::MOVING_HELPER->value => "
    * Körperlich fit,
    * Fähigkeit, schwere Gegenstände zu heben,
    * Zuverlässig und pünktlich,
    * Teamplayer,
    * Kundenfreundlich,
    * Flexible Arbeitszeiten,
    * Führerschein von Vorteil,
    * Positive Einstellung",

        JobCategories::DECLUTTER_HELPER->value => "
    * Körperlich fit,
    * Zuverlässig und pünktlich,
    * Organisiert und detailorientiert,
    * Teamplayer,
    * Respektvoller Umgang mit dem Eigentum der Kunden,
    * Grundkenntnisse in Englisch oder Deutsch,
    * Positive Einstellung,
    * Vorherige Erfahrung von Vorteil",

        JobCategories::EVENT_HELPER->value => "
    * Zuverlässig und pünktlich,
    * Körperlich fit,
    * Teamplayer,
    * Gute Kommunikationsfähigkeiten,
    * Kundenfreundliches Auftreten,
    * Bereitschaft zu flexiblen Arbeitszeiten,
    * Fähigkeit, Anweisungen zu befolgen,
    * Positive Einstellung",

        JobCategories::LOGISTICS_HELPER->value => "
    * Zuverlässig und pünktlich,
    * Körperlich fit,
    * Teamplayer,
    * Bereitschaft zu flexiblen Arbeitszeiten,
    * Fähigkeit, Anweisungen zu befolgen,
    * Sicherheitsbewusstsein,
    * Gabelstaplerführerschein,
    * Gute organisatorische Fähigkeiten",

        JobCategories::OFFICE_HELPER->value => "
    * Zuverlässig und pünktlich,
    * Kenntnisse in grundlegender Bürosoftware (Word, Excel, E-Mail),
    * Gute organisatorische und administrative Fähigkeiten,
    * Professionelle Kommunikationsfähigkeiten,
    * Detailgenauigkeit,
    * Fähigkeit, mit vertraulichen Informationen umzugehen,
    * Proaktiv und effizient im Multitasking,
    * Positive Einstellung",

        JobCategories::TUTOR_HELPER->value => "
    * Fundierte Kenntnisse im jeweiligen Fachgebiet,
    * Geduld und einfühlsamer Umgang,
    * Ausgezeichnete Kommunikations- und Unterrichtsfähigkeiten,
    * Zuverlässig und pünktlich,
    * Fähigkeit, den Unterrichtsstil an individuelle Bedürfnisse anzupassen,
    * Motivierende und ermutigende Persönlichkeit,
    * Vorherige Unterrichts- oder Nachhilfeerfahrung von Vorteil,
    * Stabile Internetverbindung (bei Fernunterricht)",

        JobCategories::IT_HELPER->value => "
    * Fundiertes Verständnis der Hardware-/Softwarefehlerbehebung,
    * Problemlösungsorientierte Denkweise,
    * Fähigkeit, technische Konzepte einfach zu erklären,
    * Zuverlässig und pünktlich,
    * Kontinuierliches Lernen (auf dem neuesten Stand der Technik bleiben),
    * Detailgenauigkeit und Sicherheitsbewusstsein,
    * Kundenfreundliches Auftreten,
    * Relevante Zertifikate oder technische Ausbildung von Vorteil",

        JobCategories::BABYSITTER_HELPER->value => "
    * Nachgewiesene Erfahrung in der Kinderbetreuung,
    * Geduld, Verantwortungsbewusstsein und Zuverlässigkeit,
    * Sicherheitsbewusst und aufmerksam,
    * Fähigkeit, Kinder in pädagogische/spaßige Aktivitäten einzubinden,
    * Einwandfreies Führungszeugnis,
    * Klare und freundliche Kommunikation mit den Eltern,
    * Grundkenntnisse in Erster Hilfe von Vorteil,
    * Positive und fürsorgliche Persönlichkeit",

        JobCategories::DRIVER_HELPER->value => "
    * Gültiger Führerschein (sauberes Fahrregister),
    * Ausgezeichnete Kenntnis der örtlichen Verkehrsregeln und Routen,
    * Zuverlässig und pünktlich,
    * Sicherheitsorientierte Fahrweise,
    * Fähigkeit, Fahrzeugwartungsprüfungen durchzuführen,
    * Kundenfreundlich und professionell,
    * Fähigkeit, in stressigen Verkehrssituationen ruhig zu bleiben,
    * Flexible Arbeitszeiten",
    ],
    'tasks' => [
        JobCategories::CONSTRUCTION_HELPER->value => "
    * Unterstützung bei der Vorbereitung und Reinigung der Baustelle,
    * Be- und Entladen von Baumaterialien,
    * Bedienung einfacher Hand- und Elektrowerkzeuge,
    * Unterstützung von Fachkräften vor Ort,
    * Einhaltung der Gesundheits- und Sicherheitsvorschriften,
    * Transport und Organisation von Baumaterialien,
    * Sauberhaltung und Ordnung des Arbeitsbereichs,
    * Ausführung allgemeiner Hilfsarbeiten",

        JobCategories::MOVING_HELPER->value => "
    * Be- und Entladen von Möbeln und Kartons,
    * Sicheres Tragen schwerer Gegenstände,
    * Verpacken und Einwickeln von Gegenständen,
    * Auf- und Abbau von Möbeln,
    * Organisation der Gegenstände im Umzugswagen,
    * Schutz zerbrechlicher Gegenstände während des Transports,
    * Unterstützung der Kunden während des Umzugs,
    * Sauberhaltung des Arbeitsbereichs",

        JobCategories::DECLUTTER_HELPER->value => "
    * Sortieren von Haushaltsgegenständen,
    * Organisation von Räumen und Lagerflächen,
    * Verpacken unerwünschter Gegenstände,
    * Entfernung von recycelbaren Materialien,
    * Verantwortungsvolle Entsorgung von Abfall,
    * Reinigung und Vorbereitung von Räumen,
    * Unterstützung der Kunden bei der Organisation,
    * Tragen von Kartons und Möbeln",

        JobCategories::EVENT_HELPER->value => "
    * Aufbau von Tischen, Stühlen und Ausrüstung,
    * Unterstützung bei der Veranstaltungsdekoration,
    * Begrüßung der Gäste,
    * Unterstützung der Veranstaltungskoordinatoren,
    * Sauberhaltung des Veranstaltungsortes,
    * Unterstützung bei der Registrierung,
    * Abbau der Ausrüstung nach der Veranstaltung,
    * Be- und Entladen von Veranstaltungsmaterialien",

        JobCategories::LOGISTICS_HELPER->value => "
    * Kommissionierung und Verpackung von Bestellungen,
    * Be- und Entladen von Lkw,
    * Organisation des Lagerbestands,
    * Kennzeichnung von Paketen,
    * Vorbereitung von Sendungen,
    * Bedienung von Lagerausrüstung,
    * Sauberhaltung des Lagers,
    * Einhaltung der Inventarverfahren",

        JobCategories::OFFICE_HELPER->value => "
    * Beantwortung von Telefonanrufen und E-Mails,
    * Terminplanung,
    * Organisation von Dokumenten,
    * Führung der Büroablage,
    * Erstellung von Berichten,
    * Dateneingabe in Systeme,
    * Unterstützung bei täglichen Verwaltungsaufgaben,
    * Empfang von Besuchern",

        JobCategories::TUTOR_HELPER->value => "
    * Erstellung von Unterrichtsplänen,
    * Individueller Unterricht für Schüler,
    * Erklärung schwieriger Konzepte,
    * Überprüfung von Hausaufgaben,
    * Verfolgung des Lernfortschritts,
    * Erstellung von Lernmaterialien,
    * Motivation der Schüler,
    * Konstruktives Feedback geben",

        JobCategories::IT_HELPER->value => "
    * Installation und Konfiguration von Software,
    * Behebung technischer Probleme,
    * Wartung von Computersystemen,
    * Unterstützung der Endnutzer,
    * Durchführung von Systemaktualisierungen,
    * Überwachung der Netzwerkleistung,
    * Dokumentation technischer Probleme,
    * Gewährleistung der Datensicherheit",

        JobCategories::BABYSITTER_HELPER->value => "
    * Beaufsichtigung der Kinder,
    * Zubereitung von Mahlzeiten und Snacks,
    * Organisation pädagogischer Aktivitäten,
    * Unterstützung bei den Hausaufgaben,
    * Aufrechterhaltung einer sicheren Umgebung,
    * Unterstützung bei der Schlafenszeit-Routine,
    * Windelwechsel bei Bedarf,
    * Kommunikation mit den Eltern",

        JobCategories::DRIVER_HELPER->value => "
    * Transport von Passagieren oder Waren,
    * Planung effizienter Routen,
    * Durchführung von Fahrzeuginspektionen,
    * Sauberhaltung des Fahrzeugs,
    * Einhaltung der Verkehrsvorschriften,
    * Be- und Entladen von Fracht,
    * Ausfüllen der Lieferdokumentation,
    * Erbringung ausgezeichneten Kundenservice",
    ],
];