<?php

    class Ldap {

        // constantes
        const servidores = array(
            "MATSED06.PDVSA.COM", 
            "MATSED09.PDVSA.COM", 
            "10.173.7.40", 
            "PDVSA.COM"
        );

        // propiedades
        private $conn;
        public $valor;

        // constructor
        function __construct($valor)  {
            $this->valor = $valor;
            $this->conexionLDAP();
        }

        // metodos
        public function conexionLDAP() {
            
            $this->conn = false;
            foreach (self::servidores as $servidor) {
                
                $this->conn = ldap_connect($servidor);
                @ldap_set_option($servidor, LDAP_OPT_PROTOCOL_VERSION, 3);   
                @ldap_set_option($servidor, LDAP_OPT_NETWORK_TIMEOUT, 5); /* 5 second timeout */

                $bind = ldap_bind($this->conn);

                if(!$bind) continue;

                if($bind) {
                    return $this->conn;
                    break;
                }

            }

            return $this->conn;
        }

        public function buscarIndicador() {

            $sr = ldap_search($this->conn, "OU=Usuarios,DC=pdvsa,DC=com","sAMAccountName=".$this->valor);

            $entrada = @ldap_first_entry($this->conn, $sr); 
            $atributos = @ldap_get_attributes($this->conn, $entrada);

            if($atributos) {
                $respuesta = array(
                    "indicador" => $atributos['UID'][0],
                    "cedula" => $atributos['pdvsacom-AD-cedula'][0],
                    "nombre" => $atributos['cn'][0],
                    "negocio" => $atributos['company'][0],
                    "localidad" => $atributos['pdvsacom-AD-physicalArea'][0],
                    "ext" => $atributos['ipPhone'][0],
                    "celular" => $atributos['mobile'][0],
                    "correo" => $atributos['mail'][0],
                    "tipoEmpleado" => $atributos['employeeType'][0],
                    "cargo" => $atributos['title'][0],
                    "nomina" => $atributos['pdvsacom-AD-payrollClass'][0],
                    "area" => $atributos['pdvsacom-AD-physicalArea'][0],
                    "aniversario" => $atributos['pdvsacom-AD-hireDate'][0],
                    "supervisor" => $atributos['pdvsacom-AD-functionalSupervisor'][0],
                    "organizacion" => $atributos['pdvsacom-AD-organization'][0],
                    "edificion" => $atributos['pdvsacom-AD-buildingName'][0],
                    "descripcion" => $atributos['description'][0]
                );
                return $respuesta;
            } else { 
                return [];
            }
        }


        public function buscarCedula() {

            $sr = ldap_search($this->conn, "OU=Usuarios,DC=pdvsa,DC=com","pdvsacom-AD-cedula=".$this->valor);

            $entrada = @ldap_first_entry($this->conn, $sr); 
            $atributos = @ldap_get_attributes($this->conn, $entrada);

            if($atributos) {
                $respuesta = array(
                    "indicador" => $atributos['UID'][0],
                    "cedula" => $atributos['pdvsacom-AD-cedula'][0],
                    "nombre" => $atributos['cn'][0],
                    "negocio" => $atributos['company'][0],
                    "localidad" => $atributos['pdvsacom-AD-physicalArea'][0],
                    "ext" => $atributos['ipPhone'][0],
                    "celular" => $atributos['mobile'][0],
                    "correo" => $atributos['mail'][0],
                    "tipoEmpleado" => $atributos['employeeType'][0],
                    "cargo" => $atributos['title'][0],
                    "nomina" => $atributos['pdvsacom-AD-payrollClass'][0],
                    "area" => $atributos['pdvsacom-AD-physicalArea'][0],
                    "aniversario" => $atributos['pdvsacom-AD-hireDate'][0],
                    "supervisor" => $atributos['pdvsacom-AD-functionalSupervisor'][0],
                    "organizacion" => $atributos['pdvsacom-AD-organization'][0],
                    "edificion" => $atributos['pdvsacom-AD-buildingName'][0],
                    "descripcion" => $atributos['description'][0]
                );
                return $respuesta;
            } else { 
                return [];
            }
        }

    }


?>