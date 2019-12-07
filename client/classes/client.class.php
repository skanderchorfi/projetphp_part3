<?php

    require 'dbconnect.class.php';

    class Client
    {
        private $cnx;
        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllClients()
        {
            try {
                $req = 'SELECT * FROM client';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        public function register($cid,$name,$email,$pwd,$phone,$adresse)
        {
            try {
                $sql = "INSERT INTO client(cid,name,email,pwd,phone,adresse)
                        VALUES (:cid,:name,:email,:pwd,:phone,:adresse, NOW())";
                $query = $this->cnx->prepare($sql);
                $query->bindparam(":cid", $cid);
                $query->bindparam(":name", $name);
                $query->bindparam(":email", $email);
                $query->bindparam(":pwd", $pwd);
                $query->bindparam(":phone", $phone);
                $query->bindparam(":adresse", $adresse);
                $query->execute();
                return $query;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        public function addNewClient($cid,$nom, $email, $pwd, $phone, $adresse)
        {
            try {
                $sql = 'INSERT INTO client(cid,nom,email,pwd,phone,adresse) VALUES (:clt_cid,:clt_nom,:clt_email,:clt_pwd,:clt_phone,:clt_adresse)';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":clt_cid", $cid);
            $result->bindparam(":clt_nom", $nom);
            $result->bindparam(":clt_email", $email);
            $result->bindparam(":clt_pwd", $pwd);
            $result->bindparam(":clt_phone", $phone);
            $result->bindparam(":clt_adresse", $adresse);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
     
        public function login($email,$pwd)
        {
            try {
                $sql = "SELECT * FROM client WHERE email= :email";
                $query = $this->cnx->prepare($sql);
                $query->bindparam(":email", $email);
                $query->execute();
                $client = $query->fetch();
                if (password_verify($pwd, $client['pwd'])) {
                    return $client;
                } else {
                    return false;
                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

      