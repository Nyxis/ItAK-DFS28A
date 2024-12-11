import subprocess
import random

class GameMaster:
    def __init__(self, success_rate=40, crit_rate=15, fumble_rate=5):
        self.success_rate = success_rate
        self.crit_rate = crit_rate
        self.fumble_rate = fumble_rate

    def pleaseGiveMeACrit(self):
        # Choisir un type de matériel au hasard
        material_type = random.randint(1, 3)

        # Exécuter le script PHP pour effectuer le tirage
        php_script = 'main.php'  # Remplacer par le chemin de votre script PHP
        process = subprocess.run(['php', php_script, str(self.success_rate), str(self.crit_rate), str(self.fumble_rate)],
                                 capture_output=True, text=True)

        # Récupérer le résultat du tirage depuis la sortie standard
        result = process.stdout.strip()

        return result

