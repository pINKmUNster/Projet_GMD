using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;


namespace iDrug.DB
{
    class MySql
    {
        string host = "netpune.telecomnancy.univ-lorraine.fr";
        string database = "gmd";
        string login = "gmd-read";
        string pwd = "esial";
        MySqlConnection connection;


        public MySql()
        {
        this.InitConnexion();
        }

        private void InitConnexion()
        {
            // Création de la chaîne de connexion
            string connectionString = "SERVER=" + host + "; DATABASE=" + database + "; UID=" + login + "; PASSWORD=" + pwd ;
            this.connection = new MySqlConnection(connectionString);
        }


    }
}
