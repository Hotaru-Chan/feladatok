using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ugynokseg_11_12
{
    class Kerteshaz : Telek
    {
        //10. feladat
        private int lakoterulet;
        public int Lakoterulet
        {
            get { return lakoterulet; }
            set
            {
                if (!(value > 10 && value < Telekmeret * 0.8))
                {
                    throw new Exception("Hibás a lakóterület értéke");
                }
                lakoterulet = value;
            }
        }

        //11. feladat
        public int KertTerulet
        {
            get
            {
                return Telekmeret - lakoterulet;
            }
        }

        //12. feladat
        public Kerteshaz(string _tipus, string _cim, int _telekmeret, int _lakoterulet, int _negyzetmeterenkenti_ar) :
            base(_cim, _telekmeret, true, _negyzetmeterenkenti_ar)
        {
            Lakoterulet = _lakoterulet;
            tipus = _tipus;
        }

        //13. feladat
        public override string ToString()
        {
            return base.ToString() + $"Lakóterület:{lakoterulet}";
        }
    }
}
