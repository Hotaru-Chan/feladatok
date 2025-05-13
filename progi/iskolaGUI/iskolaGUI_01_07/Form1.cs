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

namespace iskolaGUI_01_07
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            OpenFileDialog megnyit = new OpenFileDialog();
            if (megnyit.ShowDialog()==DialogResult.OK)
            {
                foreach (var item in File.ReadAllLines(megnyit.FileName))
                {
                    listBox1.Items.Add(item);
                }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                if (listBox1.SelectedIndex==-1)
                {
                    throw new Exception("Nem jelölt ki tanulót!");
                }
                else
                {
                    listBox1.Items.RemoveAt(listBox1.SelectedIndex);
                }
            }
            catch (Exception ex)
            {

                MessageBox.Show(ex.Message, "Hiba");
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                StreamWriter f = new StreamWriter(@"c:\nevekNEW.txt");
                foreach (var item in listBox1.Items)
                {
                    f.WriteLine(item);
                }
                f.Close();
            }
            catch (Exception ex)
            {

                MessageBox.Show(ex.Message, "Hiba");
            }
        }
    }
}
