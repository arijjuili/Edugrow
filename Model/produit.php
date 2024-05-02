<?PHP
class Produit {
    private $id;
    private $nom;
    private $prix;
    private $description;
    private $image;
    private $category;


    function __construct($id, $nom, $prix, $description, $image , $category) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
        $this->image = $image;
        $this->category = $category;


    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrix() {
        return $this->prix;
    }

    function getDescription() {
        return $this->description;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function getImage() {
        return $this->image;
    }

    function setImage($image): void {
        $this->image = $image;
    }
    function getCategory() {
        return $this->category;
    }

    function setCategory($category): void {
        $this->category = $category;
    }
    function setPrix($prix): void {
        $this->prix = $prix;
    }

    function setDescription($description): void {
        $this->description = $description;
    }
}


?>