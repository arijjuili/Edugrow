<?php





class Utilisateur
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?int $age = null;
    private ?string $tel = null;
    private ?string $rôle = null;
    private ?string $email = null;
    private ?string $pwd = null;

    public function __construct( $id = null,$n, $p, $a,$t,$r, $e, $m)
    {
        $this->id = (int) $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->age = (int) $a;
        $this->tel = $t;
        $this->rôle  = $r;
        $this->email = $e;
        $this->pwd = $m;
        
        
      
      
    }

    
    public function getid()
    {
        return $this->id;
    }

   
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getprenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

     /**
     * Get the value of password
     */
    public function getage()
    {
        return $this->age;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setage($age)
    {
        $this->age= $age;

        return $this;
    }


 /**
     * Get the value of email
     */
    public function gettel()
    {
        return $this->tel;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function settel($tel)
    {
        $this->tel = $tel;

        return $this;
    }


    /**
     * Get the value of address
     */
    public function getrôle()
    {
        return $this->rôle;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setrôle($rôle)
    {
        $this->rôle = $rôle;

        return $this;
    }

    /**
     * Get the value of Occupation
     */
     function getemail() : string
    {
        return $this->email;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Get the value of Occupation
     */
    public function getpwd()
    {
        return $this->pwd;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setpwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }
}