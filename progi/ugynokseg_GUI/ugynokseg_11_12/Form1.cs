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

namespace ugynokseg_11_12
{
    public partial class Form1 : Form
    {
        List<Ingatlan> Ingatlanok = new List<Ingatlan>();
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            OpenFileDialog ablak = new OpenFileDialog();
            if (ablak.ShowDialog()==DialogResult.OK)
            {
                int sor = 1;
                foreach (var item in File.ReadAllLines(ablak.FileName).Skip(1))
                {
                    try
                    {
                        if (item.Split(';')[0] == "telek")
                        {
                            Ingatlanok.Add(new Telek(item.Split(';')[1], Convert.ToInt32(item.Split(';')[2]), (item.Split(';')[4] == "igen"? true : false), Convert.ToInt32(item.Split(';')[3])));
                        }
                        else
                        {
                            Ingatlanok.Add(new Kerteshaz("kertesház", item.Split(';')[1], Convert.ToInt32(item.Split(';')[2]), Convert.ToInt32(item.Split(';')[5]), Convert.ToInt32(item.Split(';')[4])));
                        }
                        listBox2.Items.Add($"{sor}.sor: {Ingatlanok.Last().ToString()}");
                        sor++;
                    }
                    catch (Exception ex)
                    {

                        listBox1.Items.Add($"{sor}.sor: {ex.Message}");
                    }
                }
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string adatok = "";
            Ingatlanok.FindAll(x => x.Iranyar >= 5000000 && x.Iranyar <= 10000000).ForEach(x => adatok += $"{x.ToString()}\n");
            MessageBox.Show(adatok);
        }

        private void button3_Click(object sender, EventArgs e)
        {
            string adatok =
                Ingatlanok.FindAll(x => x as Kerteshaz != null).OrderByDescending(x => (x as Kerteshaz).KertTerulet).First().ToString();
            MessageBox.Show(adatok);
            
        }

        private void button4_Click(object sender, EventArgs e)
        {
            string adatok = "";
            Ingatlanok.FindAll(x => x as Kerteshaz != null).OrderBy(x => (x as Kerteshaz).Telekmeret).First().ToString();
            MessageBox.Show(adatok);
        }
    }
}
