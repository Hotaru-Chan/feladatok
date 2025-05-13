using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.IO;

namespace Minta_GUI
{
    public partial class Form1 : Form
    {
        List<Ososztaly> adatok = new List<Ososztaly>();
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            OpenFileDialog megnyit = new OpenFileDialog();
            if (megnyit.ShowDialog() == DialogResult.OK)
            {
                string[] sorok = File.ReadAllLines(megnyit.FileName);
                for (int i = 0; i < sorok.Length; i++)
                {
                    string[] mezok = sorok[i].Split(';');
                    try
                    {
                        string a1 = mezok[0];
                        int a2 = int.Parse(mezok[1]);
                        int a3 = int.Parse(mezok[4]);
                        string a4 = mezok[0];

                        if (a4 == "egyszerű")
                        {
                            var peldany = new Gyerekosztaly(a1, a2, a3, a4);
                            adatok.Add(peldany);
                            listBox1.Items.Add(peldany);
                        }
                        else if(a4 == "másik")
                        {
                            var peldany = new Gyerekosztaly2(a1, a2, a3, a4);
                            adatok.Add(peldany);
                            listBox1.Items.Add(peldany);
                        }
                    }
                    catch(Exception ex)
                    {
                        listBox2.Items.Add($"Hiba a {i+1}. sorban: {ex.Message}");
                    }
                }
            }
        }
    }
}
