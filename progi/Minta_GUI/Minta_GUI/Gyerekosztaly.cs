using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Minta_GUI
{
    class Gyerekosztaly : Ososztaly
    {

        public Gyerekosztaly(string a1, int a2, int a3, string a4) : base(a1, a2, a3, a4)
        {

        }

        protected override int AbsztraktMetodus()
        {
            return 5;
        }

        public override string ToString()
        {
            return base.ToString() + $", {AbsztraktMetodus()}";
        }
    }
}
