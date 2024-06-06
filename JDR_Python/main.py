# import subprocess

# result = subprocess.run(["php", "JDR_PHP/main.php"], capture_output=True, text=True)

# print(result.returncode)

from Class.Personnage import Personnage
from Class.Stat import Stat
from Class.StatType import StatType
from Class.Classe import Classe
from Class.Equipement import Equipement

force = StatType('Force')
rapidite = StatType('Rapidité')
intelligence = StatType('Intelligence')
vitalite = StatType('Vitalité')

c1 = Classe(
    'Guerrier',
    [
        Stat(force, 2),
        Stat(intelligence, -2),
    ]
)

p1 = Personnage(
    {
        Stat(force, 5),
        Stat(rapidite, 5),
        Stat(intelligence, 5),
        Stat(vitalite, 5),
    },
    c1,
    [
        Equipement(
            'Epée',
            [
                Stat(force, 2),
                Stat(intelligence, -2),
            ]
        ),
    ],
    [
        Stat(force, 0),
        Stat(rapidite, 0),
        Stat(intelligence, 0),
        Stat(vitalite, 0),
    ]
)



