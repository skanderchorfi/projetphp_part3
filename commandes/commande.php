<?php

    require 'dbconnect.class.php';
    Class commande {
        
        private $cnx;
        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

    public function readAllProducts () {
        $req = 'SELECT * FROM produit ' ;
        $result = $this ->cnx-> prepare ($req) ;
        $result-> execute() ;
        return $result ; 
    } catch (PDOException $e){
        echo $e->getMessage() ;
    }

    public function order_items ($pid) {
        try {
            $req ='SELECT * FROM produit WHERE pid = :clt_pid' ;
            $result = $this->cnx->prepare ($req) ;
            $result-> execute() ;
            return $result ; 
        } catch (PDOException $e){
            echo $e->getMessage() ;

        }
    }
    public function readAllOrders()
    {
        try {
            $req = 'SELECT * FROM commande';
            $result = $this->cnx->prepare($req);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function addNewOrder($oid,$pid, $cid, $quantite_produit, $odate, $quantite_client,$status,$vehicule)
    {
        try {
            $sql = 'INSERT INTO client(oid,pid,cid,quantite_produit,odate,quantite_client,status,vehicule) VALUES (:clt_oid,:clt_pid:clt_cid,:clt_quantite_produit,:clt_odate,:clt_quantite_client,:clt_status,:clt_vehicule) where $pid= :clt_pid';
        $result = $this->cnx->prepare($sql);
        $result->bindparam(":clt_oid", $oid);
        $result->bindparam(":clt_pid", $pid);
        $result->bindparam(":clt_cid", $cid);
        $result->bindparam(":clt_quantite_produit", $quantite_produit);
        $result->bindparam(":clt_odate", $odate);
        $result->bindparam(":clt_quantite_client", $quantite_client);
        $result->bindparam(":clt_status", $status);
        $result->bindparam(":clt_vehicule", $vehicule");
        $result->execute();
        return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}