using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Jarmuvek
{
    interface ITerhelheto
    {
        int MaxTerheles { get; }
        int TerhelesKiszamit(int suly);
    }
    class Program
    {
        static void Main(string[] args)
        {
            List<Jarmu> jarmuvek = new List<Jarmu>()
            {
                new Jarmu("Idk", 700000),
                new Jarmu("Idk2", 1000000),
                new Teherauto(1000, "Idk3", 300000),
                new Teherauto(1500, "Idk4", 450000)
            };

            Console.WriteLine($"A legolcsóbb Jármű: {jarmuvek.OrderBy(x => x.ar).First().ToString()}");
        }
    }
}
