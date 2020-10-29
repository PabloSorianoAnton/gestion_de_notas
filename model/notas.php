<?php
    class Notas {
        private $id_nota;
        private $nombre_asignatura;
        private $id_alu;
        private $nota;

        public function __construct($id_nota,$nombre_asignatura,$nota){
            $this->id_nota=$id_nota;
            $this->nombre_asignatura=$nombre_asignatura;
            $this->nota=$nota;
        }    

        public function getNota(){
                return $this->nota;
        }

        public function setNota($nota){
                $this->nota = $nota;
                return $this;
        }

        public function getId_alu(){
                return $this->id_alu;
        }

        public function setId_alu($id_alu){
                $this->id_alu = $id_alu;
                return $this;
        }

        public function getNombre_asignatura() {
                return $this->nombre_asignatura;
        }

        public function setNombre_asignatura($nombre_asignatura){
                $this->nombre_asignatura = $nombre_asignatura;
                return $this;
        }

        public function getId_nota(){
                return $this->id_nota;
        }

        public function setId_nota($id_nota){
                $this->id_nota = $id_nota;
                return $this;
        }
}