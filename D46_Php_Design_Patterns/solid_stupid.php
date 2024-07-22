<?php

# PRINCIPES SOLID

# Single Responsibility Principle : 
# Une classe ne doit avoir qu'une seule responsabilité. Il faut séparer au maximum.  

# Open Closed Principle :
# Les différentes entités doivent être ouvertes à l'extension mais fermés à la modification.

# Liskov Substitution Principle : 
# Les objets d'un programme doivent pouvoir être remplacés par des instances de leurs sous-classes sans altérer le fonctionnement correct du programme. 

# Interface Segregation Principle : 
# Séparation en interfaces spécifiques pour éviter aux utilisateurs de dépendre d'interfaces qu'ils n'utilisent pas.

# Dependency Inversion Principle : 
# Les différents modules doivent être au maximum indépendants les uns des autres. 

# --------------------------------------------------------------------------------------------------------------------------------------------------------------

# ANTI-PATTERNS STUPID 

# Singleton :
# Singleton est un patron de conception de création qui garantit que l’instance d’une classe n’existe qu’en un seul exemplaire, tout en fournissant un point d’accès global à cette instance.

class Preferences {
    private static $instance = null;
    private $preferences = ['theme' => 'dark', 'language' => 'en'] ;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Preferences();
        }
        return self::$instance;
    }

    public function set($key, $value) {
        $this->preferences[$key] = $value;
    }

    public function get($key) {
        return $this->preferences[$key] ?? 'default';
    }
}

$preferences = preferences::getInstance();
$preferences->set('theme', 'light');
echo $preferences->get('theme');
echo $preferences->get('language');

# --------------------------------------------------------------------------------------------------------------------------------------------------------------

# Tight Coupling :
# Les classes trop dépendantes les unes des autres rendent les changements et les test difficiles. 

class NotificationService {
    private $emailSender;

    public function __construct(EmailSender $emailSender) {}
}

# --------------------------------------------------------------------------------------------------------------------------------------------------------------

# Untestability : 
# Le code est difficile à tester en raison de dépendances directes sur des services externes ou de couplage fort.



# --------------------------------------------------------------------------------------------------------------------------------------------------------------

# Premature Optimization : 
# Optimiser le code trop tôt peut rendre le code complexe et difficile à maintenir. 



# --------------------------------------------------------------------------------------------------------------------------------------------------------------

# Indescriptive Naming : 
# Les noms peu descriptifs rendent le code difficile à comprendre et à maintenir. 

class X {
    public function y ($z) {
        return $z * 6;
    }
}

$x = new X();
echo $x->y(5);

# -----------------------------------------------------------------------------------------------------------

# Duplication : 
# Dupliquer du code à plusieurs endroits au lieu de le réutiliser peut rendre la maintenance difficile. 

class ProductService {
    public function getProductInfos($productId) {
        return "Product details for product n°$productId";
    }
}

class InventoryService {
    public function getProductInfos($productId) {
        return "product details for product N°$productId";
    }
}

$productService = new ProductService();
echo $productService->getProductInfos(1);

$inventoryService = new IntentoryService();
echo $InventoryService->getProductInfos(1);

?>