using System;

namespace UGYNOKSEG_11_05
{
    class Program
    {
        static void Main(string[] args)
        {
            try
            {
                ingatlan haz = new ingatlan("Mór", 20);
                //Console.WriteLine(haz.Telekmeret);
                Console.WriteLine(haz.ToString());

                /*ingatlan haz2 = new ingatlan("Siófok", 40, 50);
                Console.WriteLine(haz2.ToString());*/

                telek telek = new telek("Mór", 1000, true, 15000);
                Console.WriteLine(telek.ToString());
            }
            catch(Exception ex)
            {
                Console.WriteLine(ex.Message);
            }

        }
    }
}
