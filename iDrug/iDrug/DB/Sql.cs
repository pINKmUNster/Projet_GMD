using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;
using System.Windows;


namespace iDrug.DB
{
    class Sql
    {
        string host = "neptune.telecomnancy.univ-lorraine.fr";
        string database = "gmd";
        string login = "gmd-read";
        string pwd = "esial";

        public MySqlConnection connection;


        public Sql()
        {
        this.InitConnexion();
        }

        private void InitConnexion()
        {

            try
            {

                // Création de la chaîne de connexion
                string connectionString = "SERVER=" + host + "; DATABASE=" + database + "; UID=" + login + "; PASSWORD=" + pwd;
                string connectionString1 = "SERVER=neptune.telecomnancy.univ-lorraine.fr; DATABASE=gmd; UID=gmd-read; PASSWORD=esial;";
                
                
                this.connection = new MySqlConnection(connectionString);
            }
            catch (Exception ex)
            {
                MessageBox.Show("MySQLConnection : " + ex.Message);
            }
            
            }


    }
}
