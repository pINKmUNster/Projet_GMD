﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using iDrug.DB;
using MySql.Data.MySqlClient;

namespace iDrug
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, RoutedEventArgs e)
        {
            try
            {
                Sql bdd = new Sql();
                bdd.connection.Open();
                MySqlCommand cmd = bdd.connection.CreateCommand();
                cmd.CommandText = " SHOW COLUMNS from  adverse_effects_raw ";
                MySqlDataReader reader; 
                
                reader = cmd.ExecuteReader();


                while (reader.Read())
                {

                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
    }
}
