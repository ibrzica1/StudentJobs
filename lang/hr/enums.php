<?php

use App\Enums\JobCategories;
use App\Enums\JobDurationTypesEnum;
use App\Enums\JobSettingTypesEnum;

return [
    'job_categories' => [
        JobCategories::CONSTRUCTION_HELPER->value => 'Gradnja',
        JobCategories::MOVING_HELPER->value => 'Selidba',
        JobCategories::DECLUTTER_HELPER->value => 'Spremanje',
        JobCategories::EVENT_HELPER->value => 'Dogadaji',
        JobCategories::LOGISTICS_HELPER->value => 'Logistika',
        JobCategories::OFFICE_HELPER->value => 'Ured',
        JobCategories::TUTOR_HELPER->value => 'Poduka',
        JobCategories::IT_HELPER->value => 'It',
        JobCategories::BABYSITTER_HELPER->value => 'Dadilja' ,
        JobCategories::DRIVER_HELPER->value => 'Vozac',
    ],
    'duration_types' => [
        JobDurationTypesEnum::INDEFINITE->value => 'Neodredeno',
        JobDurationTypesEnum::WEEKS->value => '1-4 tjedana',
        JobDurationTypesEnum::MONTH1->value => '1 mjesec',
        JobDurationTypesEnum::MONTH2->value => '2 mjeseca',
        JobDurationTypesEnum::MONTH3->value => '3-5 mjeseci',
        JobDurationTypesEnum::MONTH6->value => '6 mjeseci',
        JobDurationTypesEnum::YEAR1->value => '1 godina',
        JobDurationTypesEnum::YEAR2->value => '2 godine',
        JobDurationTypesEnum::YEAR3->value => '3 godine',
    ],
    'setting_types' => [
        JobSettingTypesEnum::FULL_TIME->value => 'Puno vrijeme',
        JobSettingTypesEnum::PART_TIME->value => 'Pola vremena',
        JobSettingTypesEnum::MINI_JOB->value => 'Mini posao',
    ],
    'expectations' => [
        JobCategories::CONSTRUCTION_HELPER->value => "
    * Prethodno iskustvo u građevini,
    * Fizička spremnost,
    * Pouzdanost i točnost,
    * Svijest o sigurnosti na radu,
    * Sposobnost timskog rada,
    * Zaštitna obuća i radna odjeća,
    * Vozačka dozvola,
    * Sposobnost podizanja teških tereta,",

        JobCategories::MOVING_HELPER->value => "
    * Fizički spremni,
    * Sposobnost podizanja teških predmeta,
    * Pouzdanost i točnost,
    * Timski igrač,
    * Ljubaznost prema klijentima,
    * Fleksibilno radno vrijeme,
    * Vozačka dozvola je prednost,
    * Pozitivan stav,",

        JobCategories::DECLUTTER_HELPER->value => "
    * Fizički spremni,
    * Pouzdanost i točnost,
    * Organiziranost i pažnja na detalje,
    * Timski igrač,
    * Poštovanje prema stvarima klijenata,
    * Osnovno znanje engleskog ili njemačkog,
    * Pozitivan stav,
    * Prethodno iskustvo je prednost,",

        JobCategories::EVENT_HELPER->value => "
    * Pouzdanost i točnost,
    * Fizička spremnost,
    * Timski igrač,
    * Dobre komunikacijske vještine,
    * Ljubaznost prema klijentima,
    * Spremnost na rad u fleksibilnom radnom vremenu,
    * Sposobnost slijeđenja uputa,
    * Pozitivan stav,",

        JobCategories::LOGISTICS_HELPER->value => "
    * Pouzdanost i točnost,
    * Fizička spremnost,
    * Timski igrač,
    * Spremnost na rad u fleksibilnom radnom vremenu,
    * Sposobnost slijeđenja uputa,
    * Svijest o sigurnosti na radu,
    * Vozačka dozvola za viličar,
    * Dobre organizacijske vještine,",

        JobCategories::OFFICE_HELPER->value => "
    * Pouzdanost i točnost,
    * Znanje osnovnih uredskih alata (Word, Excel, Email),
    * Dobre organizacijske i administrativne vještine,
    * Profesionalne komunikacijske vještine,
    * Pažnja na detalje,
    * Sposobnost rukovanja povjerljivim informacijama,
    * Proaktivnost i učinkovitost u multitaskingu,
    * Pozitivan stav,",

        JobCategories::TUTOR_HELPER->value => "
    * Dobro poznavanje predmeta,
    * Strpljivost i empatičan pristup,
    * Izvrsne komunikacijske i pedagoške vještine,
    * Pouzdanost i točnost,
    * Sposobnost prilagodbe načina poučavanja individualnim potrebama,
    * Poticajna i motivirajuća osobnost,
    * Prethodno iskustvo u podučavanju je prednost,
    * Stabilna internetska veza (za online podučavanje),",

        JobCategories::IT_HELPER->value => "
    * Solidno razumijevanje rješavanja problema s hardverom/softverom,
    * Sposobnost rješavanja problema,
    * Sposobnost jednostavnog objašnjavanja tehničkih koncepata,
    * Pouzdanost i točnost,
    * Kontinuirano učenje (praćenje tehnoloških trendova),
    * Pažnja na detalje i svijest o sigurnosti podataka,
    * Ljubaznost prema klijentima,
    * Relevantne certifikacije ili tehničko obrazovanje su prednost,",

        JobCategories::BABYSITTER_HELPER->value => "
    * Dokazano iskustvo u čuvanju djece,
    * Strpljivost, odgovornost i pouzdanost,
    * Svijest o sigurnosti i pažljivost,
    * Sposobnost uključivanja djece u edukativne/zabavne aktivnosti,
    * Čista kaznena evidencija (provjera),
    * Jasna i ljubazna komunikacija s roditeljima,
    * Osnovno znanje prve pomoći je prednost,
    * Pozitivna i brižna osobnost,",

        JobCategories::DRIVER_HELPER->value => "
    * Važeća vozačka dozvola (bez prekršaja),
    * Izvrsno poznavanje lokalnih prometnih propisa i ruta,
    * Pouzdanost i točnost,
    * Sigurnosno osviješten stil vožnje,
    * Sposobnost provjere tehničke ispravnosti vozila,
    * Ljubaznost i profesionalnost prema klijentima,
    * Sposobnost ostajanja smirenim u stresnim prometnim uvjetima,
    * Fleksibilno radno vrijeme,",
    ],
    'tasks' => [
        JobCategories::CONSTRUCTION_HELPER->value => "
    * Pomoć u pripremi i čišćenju gradilišta,
    * Utovar i istovar građevinskog materijala,
    * Rukovanje osnovnim ručnim i električnim alatima,
    * Podrška kvalificiranim radnicima na gradilištu,
    * Poštivanje propisa o zdravlju i sigurnosti,
    * Premještanje i organiziranje građevinskog materijala,
    * Održavanje čistoće i urednosti radnog prostora,
    * Obavljanje općih fizičkih poslova,",

        JobCategories::MOVING_HELPER->value => "
    * Utovar i istovar namještaja i kutija,
    * Sigurno nošenje teških predmeta,
    * Pakiranje i zamatanje stvari,
    * Sastavljanje i rastavljanje namještaja,
    * Organiziranje stvari unutar kamiona za selidbu,
    * Zaštita lomljivih predmeta tijekom prijevoza,
    * Pomoć klijentima tijekom selidbe,
    * Održavanje čistoće radnog prostora,",

        JobCategories::DECLUTTER_HELPER->value => "
    * Sortiranje kućanskih predmeta,
    * Organiziranje soba i skladišnih prostora,
    * Pakiranje neželjenih stvari,
    * Uklanjanje materijala za recikliranje,
    * Odgovorno zbrinjavanje otpada,
    * Čišćenje i priprema prostora,
    * Pomoć klijentima u organizaciji,
    * Nošenje kutija i namještaja,",

        JobCategories::EVENT_HELPER->value => "
    * Postavljanje stolova, stolica i opreme,
    * Pomoć pri ukrašavanju za događaj,
    * Dočekivanje gostiju,
    * Podrška organizatorima događaja,
    * Održavanje čistoće prostora,
    * Pomoć pri registraciji,
    * Rastavljanje opreme nakon događaja,
    * Utovar i istovar materijala za događaj,",

        JobCategories::LOGISTICS_HELPER->value => "
    * Preuzimanje i pakiranje narudžbi,
    * Utovar i istovar kamiona,
    * Organiziranje skladišnog inventara,
    * Označavanje paketa,
    * Priprema pošiljki,
    * Rukovanje skladišnom opremom,
    * Održavanje čistoće skladišta,
    * Praćenje procedura vođenja inventara,",

        JobCategories::OFFICE_HELPER->value => "
    * Odgovaranje na telefonske pozive i emailove,
    * Zakazivanje termina,
    * Organiziranje dokumenata,
    * Vođenje uredske evidencije,
    * Priprema izvještaja,
    * Unos podataka u sustave,
    * Podrška svakodnevnim administrativnim zadacima,
    * Dočekivanje posjetitelja,",

        JobCategories::TUTOR_HELPER->value => "
    * Priprema planova nastave,
    * Individualno podučavanje učenika,
    * Objašnjavanje složenih koncepata,
    * Pregled domaćih zadaća,
    * Praćenje napretka učenika,
    * Izrada nastavnih materijala,
    * Motiviranje učenika,
    * Davanje konstruktivnih povratnih informacija,",

        JobCategories::IT_HELPER->value => "
    * Instalacija i konfiguracija softvera,
    * Rješavanje tehničkih problema,
    * Održavanje računalnih sustava,
    * Podrška korisnicima,
    * Provođenje sistemskih ažuriranja,
    * Praćenje performansi mreže,
    * Dokumentiranje tehničkih problema,
    * Osiguravanje sigurnosti podataka,",

        JobCategories::BABYSITTER_HELPER->value => "
    * Nadzor nad djecom,
    * Priprema obroka i užina,
    * Organiziranje edukativnih aktivnosti,
    * Pomoć s domaćom zadaćom,
    * Održavanje sigurnog okruženja,
    * Pomoć pri rutini odlaska na spavanje,
    * Presvlačenje pelena po potrebi,
    * Komunikacija s roditeljima,",

        JobCategories::DRIVER_HELPER->value => "
    * Prijevoz putnika ili robe,
    * Planiranje učinkovitih ruta,
    * Provjera tehničke ispravnosti vozila,
    * Održavanje čistoće vozila,
    * Poštivanje prometnih propisa,
    * Utovar i istovar tereta,
    * Popunjavanje dokumentacije o dostavi,
    * Pružanje izvrsne korisničke usluge,",
    ]
];