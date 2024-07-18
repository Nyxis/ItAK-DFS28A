import subprocess
import os

class GameMaster:
    def __init__(self, success_rate, crit_rate, fumble_rate):
        self.success_rate = success_rate
        self.crit_rate = crit_rate
        self.fumble_rate = fumble_rate

    def pleaseGiveMeACrit(self):
        path = os.path.dirname(os.path.abspath(__file__)) + '\\..\\..\\JDR_PHP\\main.php'
        result = subprocess.run(
            ['php', path, str(self.success_rate), str(self.crit_rate), str(self.fumble_rate)],
            capture_output=True, text=True
        )
        return result.returncode