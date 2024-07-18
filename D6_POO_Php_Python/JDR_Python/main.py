from Class.Personnage import Personnage
from Class.Stat import Stat
from Class.Taux import Taux
from Class.TauxModificateur import TauxModificateur
from Class.StatType import StatType, force, rapidite, intelligence, vitalite, critique, fumble, echec, succes
from Class.Classe import Classe
from Class.Equipement import Equipement
from Class.Rencontre import Rencontre
from Class.GameMaster import GameMaster
from Class.Scenario import Scenario

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

# personnage

p1 = Personnage('Tristan', p1_base_stats, p1_classe, [epee])

# rencontre

r1 = Rencontre(
    'Rencontre 1',
    [Taux(fumble, 5), Taux(critique, 15), Taux(succes, 40), Taux(echec, 40)],
    [TauxModificateur(Taux(critique, 5), echec, force, 10, 'gte'), TauxModificateur(Taux(fumble, 5), succes, rapidite, 5, 'gte')],
    5,
    bouclier
)

gm = GameMaster(40, 15, 5)

scenario = Scenario([r1])

print(scenario.lancer(p1, gm))