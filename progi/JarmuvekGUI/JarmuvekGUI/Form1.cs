using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace JarmuvekGUI
{

    interface ITerhelheto
    {
        int MaxTerheles { get; }
        int TerhelesKiszamit(int suly);
    }

    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        List<ITerhelheto> jarmuvek = new List<ITerhelheto>()
            {
                new Hajo("Idk", 700000),
                new Hajo("Idk2", 1000000),
                new Teherauto(1000, "Idk3", 300000),
                new Teherauto(1500, "Idk4", 450000)
            };

        private void button1_Click(object sender, EventArgs e)
        {
            MessageBox.Show();
        }
    }
}
