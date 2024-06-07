# import subprocess

# result = subprocess.run(["php", "JDR_PHP/main.php"], capture_output=True, text=True)

# print(result.returncode)

from Class.Personnage import Personnage
from Class.Stat import Stat
from Class.Taux import Taux
from Class.TauxModificateur import TauxModificateur
from Class.StatType import StatType
from Class.Classe import Classe
from Class.Equipement import Equipement
from Class.Rencontre import Rencontre

force = StatType('Force')
rapidite = StatType('Rapidité')
intelligence = StatType('Intelligence')
vitalite = StatType('Vitalité')

# equipement

epee_stats = [
    Stat(force, 2),
    Stat(intelligence, -2),
]

epee = Equipement('Epée', epee_stats)

bouclier_stats = [
    Stat(vitalite, 2),
    Stat(rapidite, -2),
]

bouclier = Equipement('Bouclier', bouclier_stats)

# classe

p1_classe = Classe(
    'Guerrier',
    [
        Stat(force, 2),
        Stat(intelligence, -2),
    ]
)

# stats

p1_base_stats = [
    Stat(force, 5),
    Stat(rapidite, 5),
    Stat(intelligence, 5),
    Stat(vitalite, 5),
]

p1_modificateurs = [
    Stat(force, 0),
    Stat(rapidite, 0),
    Stat(intelligence, 0),
    Stat(vitalite, 0),
]

# personnage

p1 = Personnage(p1_base_stats, p1_classe, [epee], p1_modificateurs)

# rencontre

fumble = StatType('Fumble')
critique = StatType('Critique')
succes = StatType('Succes')
echec = StatType('Echec')

r1 = Rencontre(
    'Rencontre!',
    [
        Taux(fumble, 5),
        Taux(critique, 15),
        Taux(succes, 40),
        Taux(echec, 40),
    ],
    [
        TauxModificateur(Taux(critique, 5), echec, force, 10, 'gte'),
        TauxModificateur(Taux(fumble, 5), succes, rapidite, 5, 'gte'),
    ],
    5,
    bouclier
)

print(r1.calculate_rates(p1))

