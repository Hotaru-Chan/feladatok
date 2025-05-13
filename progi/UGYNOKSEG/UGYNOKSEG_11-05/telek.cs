using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace UGYNOKSEG_11_05
{
    class telek : ingatlan
    {
        //7. feladat
        public bool beepithetoe;
        public bool Beepithetoe
        {
            get { return beepithetoe; }
            set { beepithetoe = value; }
        }

        //8. feladat
        public telek(string _cim, int _telekmeret, bool _beepithetoe, int _negyzetmeterenkenti_ar) : base(_cim, _telekmeret, _telekmeret*_negyzetmeterenkenti_ar)
        {
            beepithetoe = _beepithetoe;
            tipus = "telek";
        }

        //9. feladat
        public override string ToString()
        {
            return base.ToString() + (beepithetoe ? "(BEÉPÍTHETŐ)" : "(NEM BEÉPÍTHETŐ");
        }

    }
}
