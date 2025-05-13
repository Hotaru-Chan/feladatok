using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Minta_GUI
{
    abstract class Ososztaly
    {
        //adattagok
        private string adattag1;
        private int adattag2;
        protected int adattag3;
        private string adattag4;

        //jellemzők
        public string Adattag4
        {
            get { return adattag4; }
            set
            {
                if (value != "alma" || value !="banan" || value != "korte")
                {
                    throw new Exception("Hiba!");
                }
                adattag4 = value;
            }
        }

        public int Adattag2
        {
            get => adattag2;
            set
            {
                if (value <1 || value >100)
                {
                    throw new Exception("1-100 között lehet csak!");
                }
                adattag2 = value;
            }
        }

        //konstruktor
        public Ososztaly(string a1, int a2, int a3, string a4)
        {
            adattag1 = a1;
            Adattag2 = a2;
            adattag3 = a3;
            Adattag4 = a4;
        }

        public Ososztaly(string a1, int a2, int a3)
        {
            adattag1 = a1;
            Adattag2 = a2;
            adattag3 = a3;
            Adattag4 = "alma";
        }

        //metódusok
        public void PlMetodus()
        {
            if (adattag4 == "alma")
            {
                adattag4 = "barack";
            }
            else if (adattag4 =="dinnye")
            {
                throw new Exception("Nem lehet dinnye!");
            }
        }

        protected abstract int AbsztraktMetodus();

        public override string ToString()
        {
            return $"{adattag1}, {adattag2}";
        }




    }
}
