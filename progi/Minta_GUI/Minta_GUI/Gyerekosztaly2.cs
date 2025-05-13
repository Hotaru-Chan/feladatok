using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Minta_GUI
{
    class Gyerekosztaly2 : Ososztaly
    {
        public Gyerekosztaly2(string a1, int a2, int a3, string a4)
            : base(a1, a2, a3, a4)
        {

        }

        protected override int AbsztraktMetodus()
        {
            return Adattag2 * adattag3 > 50000 ? 7 : 10;
        }

        public override string ToString()
        {
            return base.ToString() + $", {AbsztraktMetodus()}";
        }
    }
}
