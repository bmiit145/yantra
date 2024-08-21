<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // State::truncate();

        $states = array(
            array(
                'name' => "United States",
                'country_code' => 'US',
                'states' =>array(
                    "Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut",
                    "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa",
                    "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan",
                    "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire",
                    "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", 
                    "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", 
                    "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", 
                    "Wisconsin", "Wyoming" ),
                
                ),
                array(
                'name' => "Canada",
                'country_code' => 'CA',
                'states' => array(
                    "Alberta", "British Columbia", "Manitoba", "New Brunswick", "Newfoundland and Labrador",
                    "Northwest Territories", "Nova Scotia", "Nunavut", "Ontario", "Prince Edward Island",
                    "Quebec", "Saskatchewan", "Yukon"
                )
            ),
            array(
                'name' => "Australia",
                'country_code' => 'AU',
                'states' => array(
                    "Australian Capital Territory", "New South Wales", "Northern Territory", "Queensland", 
                    "South Australia", "Tasmania", "Victoria", "Western Australia"
                )
            ),
            array(
                'name' => "India",
                'country_code' => 'IN',
                'states' => array(
                    "Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
                    "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli and Daman and Diu", "Delhi", 
                    "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", 
                    "Karnataka", "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra", 
                    "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", 
                    "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", 
                    "Uttarakhand", "West Bengal"
                )
            ),
            array(
                'name' => "United Kingdom",
                'country_code' => 'GB',
                'states' => array(
                    "England", "Scotland", "Wales", "Northern Ireland"
                )
            ),
            array(
                'name' => "Germany",
                'country_code' => 'DE',
                'states' => array(
                    "Baden-Württemberg", "Bavaria", "Berlin", "Brandenburg", "Bremen", "Hamburg", 
                    "Hesse", "Lower Saxony", "Mecklenburg-Vorpommern", "North Rhine-Westphalia", 
                    "Rhineland-Palatinate", "Saarland", "Saxony", "Saxony-Anhalt", "Schleswig-Holstein", 
                    "Thuringia"
                )
            ),
            array(
                'name' => "France",
                'country_code' => 'FR',
                'states' => array(
                    "Auvergne-Rhône-Alpes", "Bourgogne-Franche-Comté", "Brittany", "Centre-Val de Loire",
                    "Corsica", "Grand Est", "Hauts-de-France", "Île-de-France", "Normandy", "Nouvelle-Aquitaine",
                    "Occitanie", "Pays de la Loire", "Provence-Alpes-Côte d'Azur"
                )
            ),
            array(
                'name' => "Italy",
                'country_code' => 'IT',
                'states' => array(
                    "Abruzzo", "Basilicata", "Calabria", "Campania", "Emilia-Romagna", "Friuli Venezia Giulia",
                    "Lazio", "Liguria", "Lombardy", "Marche", "Molise", "Piedmont", "Puglia", "Sardinia",
                    "Sicily", "Tuscany", "Trentino-Alto Adige", "Umbria", "Aosta Valley", "Veneto"
                )
            ),
            array(
                'name' => "Japan",
                'country_code' => 'JP',
                'states' => array(
                    "Aichi", "Akita", "Aomori", "Chiba", "Ehime", "Fukui", "Fukuoka", "Fukushima", 
                    "Gifu", "Gunma", "Hiroshima", "Hokkaido", "Hyogo", "Ibaraki", "Ishikawa", "Ishikawa", 
                    "Kagawa", "Kagoshima", "Kanagawa", "Kochi", "Kumamoto", "Kyoto", "Mie", "Miyagi", 
                    "Miyazaki", "Nagano", "Nagasaki", "Nagasaki", "Nara", "Niigata", "Oita", "Okayama", 
                    "Osaka", "Saga", "Shiga", "Shimane", "Shizuoka", "Tochigi", "Tokushima", "Tokyo",
                    "Tottori", "Toyama", "Wakayama", "Yamagata", "Yamaguchi", "Yokohama"
                )
            ),
            array(
                'name' => "Afghanistan",
                'country_code' => 'AF',
                'states' => array(
                    "Badakhshan", "Badghis", "Baghlan", "Balkh", "Bamyan", "Daykundi", "Farah", 
                    "Faryab", "Ghazni", "Ghor", "Helmand", "Herat", "Jowzjan", "Kabul", "Kandahar", 
                    "Kapisa", "Khost", "Kunar", "Kunduz", "Laghman", "Logar", "Nangarhar", 
                    "Nimroz", "Nuristan", "Paktia", "Paktika", "Panjshir", "Samangan", 
                    "Sar-e Pol", "Takhar", "Urozgan", "Wardak", "Zabul"
                )
            ),
            array(
                'name' => "Aland Islands",
                'country_code' => 'AX',
                'states' => array(
                    "Aland Islands" 
                )
            ),
            array(
                'country_code' => 'AL',
                'name' => 'Albania',
                'states' => array() // Albania has no states
            ),
            array(
                'country_code' => 'DZ',
                'name' => 'Algeria',
                'states' => array() // Algeria has no states
            ),
            array(
                'country_code' => 'AS',
                'name' => 'American Samoa',
                'states' => array() // American Samoa is a territory with no states
            ),
            array(
                'country_code' => 'AD',
                'name' => 'Andorra',
                'states' => array() // Andorra has no states
            ),
            array(
                'country_code' => 'AO',
                'name' => 'Angola',
                'states' => array() // Angola has no states
            ),
            array(
                'country_code' => 'AI',
                'name' => 'Anguilla',
                'states' => array() // Anguilla is a territory with no states
            ),
            array(
                'country_code' => 'AG',
                'name' => 'Antigua and Barbuda',
                'states' => array() // Antigua and Barbuda has no states
            ),
            array(
                'country_code' => 'AR',
                'name' => 'Argentina',
                'states' => array(
                    "Buenos Aires", "Catamarca", "Chaco", "Chubut", "Córdoba", "Corrientes",
                    "Entre Ríos", "Formosa", "Jujuy", "La Pampa", "La Rioja", "Mendoza",
                    "Misiones", "Neuquén", "Río Negro", "Salta", "San Juan", "San Luis",
                    "Santa Cruz", "Santa Fe", "Santiago del Estero", "Tierra del Fuego",
                    "Tucumán"
                )
            ),
            array(
                'country_code' => 'AM',
                'name' => 'Armenia',
                'states' => array(
                    "Ararat", "Armavir", "Gegharkunik", "Kotayk", "Lori", "Shirak", 
                    "Syunik", "Tavush", "Vayots Dzor", "Yerevan"
                )
            ),
            array(
                'country_code' => 'AW',
                'name' => 'Aruba',
                'states' => array() // Aruba is a single administrative region
            ),
            array(
                'country_code' => 'AT',
                'name' => 'Austria',
                'states' => array(
                    "Burgenland", "Carinthia", "Lower Austria", "Upper Austria", "Salzburg",
                    "Styria", "Tyrol", "Vorarlberg", "Vienna"
                )
            ),
            array(
                'country_code' => 'AZ',
                'name' => 'Azerbaijan',
                'states' => array(
                    "Absheron", "Agdam", "Agjabadi", "Agstafa", "Baku", "Balakan", 
                    "Barda", "Beylagan", "Ganja", "Goychay", "Guba", "Gusar", 
                    "Lankaran", "Lankaran District", "Lerik", "Mingachevir", "Naftalan",
                    "Oguz", "Sabirabad", "Shaki", "Shamakhy", "Shamkir", "Siyazan",
                    "Sumgait", "Tartar", "Tovuz", "Zardab"
                )
            ),
            array(
                'country_code' => 'BS',
                'name' => 'Bahamas',
                'states' => array() // The Bahamas has no states
            ),
            array(
                'country_code' => 'BH',
                'name' => 'Bahrain',
                'states' => array(
                    "Central Governorate", "Northern Governorate", "Southern Governorate", "Capital Governorate"
                )
            ),
            array(
                'country_code' => 'BD',
                'name' => 'Bangladesh',
                'states' => array(
                    "Dhaka", "Chittagong", "Khulna", "Rajshahi", "Barisal", "Sylhet",
                    "Rangpur", "Mymensingh"
                )
            ),
            array(
                'country_code' => 'BB',
                'name' => 'Barbados',
                'states' => array() // Barbados has no states
            ),
            array(
                'country_code' => 'BY',
                'name' => 'Belarus',
                'states' => array(
                    "Brest", "Gomel", "Grodno", "Minsk", "Minsk City", "Vitebsk"
                )
            ),
            array(
                'country_code' => 'BE',
                'name' => 'Belgium',
                'states' => array(
                    "Brussels-Capital", "Flemish Brabant", "Antwerp", "East Flanders",
                    "Hainaut", "Liège", "Limburg", "Luxembourg", "Namur", "Walloon Brabant"
                )
            ),
            array(
                'country_code' => 'BZ',
                'name' => 'Belize',
                'states' => array(
                    "Belize", "Cayo", "Corozal", "Orange Walk", "Stann Creek", "Toledo"
                )
            ),
            array(
                'country_code' => 'BJ',
                'name' => 'Benin',
                'states' => array(
                    "Atlantique", "Borgou", "Alibori", "Mono", "Ouémé", "Zou", 
                    "Collines", "Donga", "Kouffo", "Plateau", "Quémé"
                )
            ),
            array(
                'country_code' => 'BM',
                'name' => 'Bermuda',
                'states' => array() // Bermuda is a single administrative region
            ),
            array(
                'country_code' => 'BT',
                'name' => 'Bhutan',
                'states' => array(
                    "Bumthang", "Chukha", "Dagana", "Gasa", "Haa", "Paro", 
                    "Punakha", "Samdrup Jongkhar", "Samtse", "Sarpang", "Thimphu", 
                    "Trashigang", "Trashiyangtse", "Wangdue Phodrang", "Zhemgang"
                )
            ),
            array(
                'country_code' => 'BO',
                'name' => 'Bolivia, Plurinational State of',
                'states' => array(
                    "Chuquisaca", "Cochabamba", "Colcha", "La Paz", "Oruro", 
                    "Pando", "Potosí", "Santa Cruz", "Tarija", "Beni"
                )
            ),
            array(
                'country_code' => 'BQ',
                'name' => 'Bonaire, Sint Eustatius and Saba',
                'states' => array(
                    "Bonaire", "Sint Eustatius", "Saba"
                )
            ),
            array(
                'country_code' => 'BA',
                'name' => 'Bosnia and Herzegovina',
                'states' => array(
                    "Federation of Bosnia and Herzegovina", "Republika Srpska", "Brčko District"
                )
            ),
            array(
                'country_code' => 'BW',
                'name' => 'Botswana',
                'states' => array(
                    "Central", "Ghanzi", "Kgalagadi", "Kgatleng", "Kweneng", "North-East", 
                    "North-West", "South-East", "Southern"
                )
            ),
            array(
                'country_code' => 'BR',
                'name' => 'Brazil',
                'states' => array(
                    "Acre", "Alagoas", "Amapá", "Amazonas", "Bahia", "Ceará", "Distrito Federal",
                    "Espírito Santo", "Goiás", "Maranhão", "Mato Grosso", "Mato Grosso do Sul",
                    "Minas Gerais", "Pará", "Paraíba", "Paraná", "Pernambuco", "Piauí",
                    "Rio de Janeiro", "Rio Grande do Norte", "Rio Grande do Sul", "Rondônia",
                    "Roraima", "São Paulo", "Sergipe", "Tocantins"
                )
            ),
            array(
                'country_code' => 'IO',
                'name' => 'British Indian Ocean Territory',
                'states' => array() // British Indian Ocean Territory has no states
            ),
            array(
                'country_code' => 'BN',
                'name' => 'Brunei Darussalam',
                'states' => array(
                    "Brunei-Muara", "Belait", "Tutong", "Temburong"
                )
            ),
            array(
                'country_code' => 'BG',
                'name' => 'Bulgaria',
                'states' => array(
                    "Blagoevgrad", "Burgas", "Dobrich", "Gabrovo", "Haskovo", "Kardzhali",
                    "Kazanlak", "Kjustendil", "Montana", "Pazardzhik", "Pernik", "Plovdiv",
                    "Ruse", "Shumen", "Silistra", "Sliven", "Smolyan", "Sofia", "Sofia City",
                    "Stara Zagora", "Targovishte", "Varna", "Veliko Tarnovo", "Vidin", "Vratsa"
                )
            ),
            array(
                'country_code' => 'BF',
                'name' => 'Burkina Faso',
                'states' => array(
                    "Boucle du Mouhoun", "Cascades", "Centre", "Centre-Est", "Centre-Nord", 
                    "Centre-Ouest", "Centre-Sud", "Est", "Hauts-Bassins", "Nord", "Sahel", 
                    "Sud-Ouest", "Sud"
                )
            ),
            array(
                'country_code' => 'BI',
                'name' => 'Burundi',
                'states' => array(
                    "Bujumbura Mairie", "Bujumbura Rural", "Bururi", "Cankuzo", "Cibitoke", 
                    "Gitega", "Karuzi", "Kayanza", "Kirundo", "Makamba", "Muramvya", "Muyinga",
                    "Ngozi", "Rutana", "Ruyigi"
                )
            ),
            array(
                'country_code' => 'KH',
                'name' => 'Cambodia',
                'states' => array(
                    "Banteay Meanchey", "Battambang", "Kampong Cham", "Kampong Chhnang", 
                    "Kampong Speu", "Kampong Thom", "Kampot", "Kandal", "Kep", "Koh Kong", 
                    "Kratie", "Mondulkiri", "Phnom Penh", "Preah Vihear", "Prey Veng", 
                    "Pursat", "Ratanakiri", "Siem Reap", "Sihanoukville", "Stung Treng", 
                    "Svay Rieng", "Takeo", "Tbong Khmum"
                )
            ),
            array(
                'country_code' => 'CM',
                'name' => 'Cameroon',
                'states' => array(
                    "Adamawa", "Central", "East", "Far North", "Littoral", "North", "Northwest",
                    "South", "Southwest", "West"
                )
            ),
            array(
                'country_code' => 'CV',
                'name' => 'Cape Verde',
                'states' => array(
                    "Boa Vista", "Brava", "Bro", "Fogo", "Maio", "Santiago", "São Nicolau", "São Vicente"
                )
            ),
            array(
                'country_code' => 'KY',
                'name' => 'Cayman Islands',
                'states' => array() // Cayman Islands is a single administrative region
            ),
            array(
                'country_code' => 'CF',
                'name' => 'Central African Republic',
                'states' => array(
                    "Bangui", "Bamingui-Bangoran", "Bas-Uele", "Haut-Mbomou", "Haut-Uele", 
                    "Kémo", "Lobaye", "Mambéré-Kadéï", "Mbomou", "Nana-Mambéré", "Ouham", 
                    "Ouham-Pendé", "Vakaga"
                )
            ),
            array(
                'country_code' => 'TD',
                'name' => 'Chad',
                'states' => array(
                    "Chari-Baguirmi", "Guéra", "Hadjer-Lamis", "Kanem", "Lac", "Logone Occidental",
                    "Logone Oriental", "Mandoul", "Mayo-Kebbi Est", "Mayo-Kebbi Ouest", 
                    "Motak", "N'Djamena", "Tandjilé", "Tibesti", "Wadi Fira"
                )
            ),
            array(
                'country_code' => 'CL',
                'name' => 'Chile',
                'states' => array(
                    "Antofagasta", "Araucanía", "Arica y Parinacota", "Atacama", "Biobío", 
                    "Coquimbo", "Libertador General Bernardo O'Higgins", "Los Lagos", 
                    "Los Ríos", "Maule", "Metropolitana de Santiago", "Ñuble", "Tarapacá", 
                    "Valparaíso"
                )
            ),
            array(
                'country_code' => 'CN',
                'name' => 'China',
                'states' => array(
                    "Beijing", "Chongqing", "Shanghai", "Tianjin", "Anhui", "Fujian", 
                    "Gansu", "Guangdong", "Guangxi", "Guizhou", "Hainan", "Hebei", 
                    "Heilongjiang", "Henan", "Hong Kong", "Hubei", "Hunan", "Jiangsu", 
                    "Jiangxi", "Jilin", "Liaoning", "Macau", "Ningxia", "Qinghai", 
                    "Shaanxi", "Shandong", "Shanxi", "Sichuan", "Taiwan", "Tibet", 
                    "Xinjiang", "Xizang", "Yunnan", "Zhejiang"
                )
            ),
            array(
                'country_code' => 'CX',
                'name' => 'Christmas Island',
                'states' => array() // Christmas Island is a single administrative region
            ),
            array(
                'country_code' => 'CC',
                'name' => 'Cocos (Keeling) Islands',
                'states' => array() // Cocos (Keeling) Islands is a single administrative region
            ),
            array(
                'country_code' => 'CO',
                'name' => 'Colombia',
                'states' => array(
                    "Amazonas", "Antioquia", "Arauca", "Atlántico", "Bolívar", "Boyacá",
                    "Caldas", "Caquetá", "Casanare", "Cauca", "Cesar", "Chocó", "Córdoba",
                    "Cundinamarca", "Guainía", "Guaviare", "Guajira", "Huila", "La Guajira",
                    "Magdalena", "Meta", "Nariño", "Norte de Santander", "Putumayo", "Quindío",
                    "Risaralda", "San Andrés and Providencia", "Santander", "Sucre", "Tolima",
                    "Valle del Cauca", "Vaupés", "Vichada"
                )
            ),
            array(
                'country_code' => 'KM',
                'name' => 'Comoros',
                'states' => array(
                    "Grande Comore", "Anjouan", "Moheli"
                )
            ),
            array(
                'country_code' => 'CK',
                'name' => 'Cook Islands',
                'states' => array(
                    "Aitutaki", "Atiu", "Mangaia", "Manihiki", "Mauke", "Rarotonga", "Pukapuka", "Nassau"
                )
            ),
            array(
                'country_code' => 'CR',
                'name' => 'Costa Rica',
                'states' => array(
                    "San José", "Alajuela", "Cartago", "Heredia", "Guanacaste", "Puntarenas", "Limón"
                )
            ),
            array(
                'country_code' => 'CI',
                'name' => 'Côte d\'Ivoire',
                'states' => array(
                    "Abengourou", "Abidjan", "Bafing", "Bas-Sassandra", "Comoé", "Denguelé", 
                    "Gôh", "Lacs", "Marahoué", "Moyen-Cavally", "Moyen-Comoé", "Sassandra-Marahoué",
                    "Vallee du Bandama", "Worodougou", "Yamoussoukro", "Zanzan"
                )
            ),
            array(
                'country_code' => 'HR',
                'name' => 'Croatia',
                'states' => array(
                    "Zagreb", "Split-Dalmatia", "Dubrovnik-Neretva", "Osijek-Baranja", 
                    "Vukovar-Srijem", "Primorje-Gorski Kotar", "Virovitica-Podravina", 
                    "Bjelovar-Bilogora", "Karlovac", "Koprivnica-Križevci", "Sisak-Moslavina", 
                    "Zadar", "Lika-Senj"
                )
            ),

            array(
                'country_code' => 'CU',
                'name' => 'Cuba',
                'states' => array() // Cuba is a single administrative region
            ),
            array(
                'country_code' => 'CW',
                'name' => 'Curaçao',
                'states' => array() // Curaçao is a single administrative region
            ),
            array(
                'country_code' => 'CZ',
                'name' => 'Czech Republic',
                'states' => array(
                    "Hlavní město Praha", "Středočeský kraj", "Jihočeský kraj", "Plzeňský kraj",
                    "Karlovarský kraj", "Ústecký kraj", "Liberecký kraj", "Královéhradecký kraj",
                    "Pardubický kraj", "Vysočina", "Jihomoravský kraj", "Olomoucký kraj", 
                    "Zlínský kraj", "Moravskoslezský kraj"
                )
            ),
            array(
                'country_code' => 'DK',
                'name' => 'Denmark',
                'states' => array(
                    "Hovedstaden", "Sjælland", "Syddanmark", "Midtjylland", "Nordjylland"
                )
            ),
            array(
                'country_code' => 'DJ',
                'name' => 'Djibouti',
                'states' => array(
                    "Ali Sabieh", "Arta", "Dikhil", "Djibouti", "Obock", "Tadjourah"
                )
            ),
            array(
                'country_code' => 'DM',
                'name' => 'Dominica',
                'states' => array() // Dominica is a single administrative region
            ),
            array(
                'country_code' => 'DO',
                'name' => 'Dominican Republic',
                'states' => array(
                    "Azua", "Baoruco", "Barahona", "Dajabón", "Distrito Nacional", "Duarte",
                    "Elias Piña", "Elías Piña", "El Seibo", "Espaillat", "Hato Mayor", "Independencia",
                    "La Altagracia", "La Romana", "La Vega", "María Trinidad Sánchez", "Monte Cristi",
                    "Monte Plata", "Pedernales", "Peravia", "Puerto Plata", "Samaná", "San Cristóbal",
                    "San José de Ocoa", "San Juan", "San Pedro de Macorís", "Sánchez Ramírez",
                    "Santiago", "Santiago Rodríguez", "Valverde"
                )
            ),
            array(
                'country_code' => 'EC',
                'name' => 'Ecuador',
                'states' => array(
                    "Azuay", "Bolívar", "Cañar", "Carchi", "Chimborazo", "Cotopaxi",
                    "El Oro", "Esmeraldas", "Galápagos", "Guayas", "Imbabura", "Loja",
                    "Los Ríos", "Manabí", "Morona Santiago", "Napo", "Orellana", "Pastaza",
                    "Pichincha", "Santa Elena", "Santo Domingo de los Tsáchilas", "Sucumbíos",
                    "Tungurahua", "Zamora-Chinchipe"
                )
            ),
            array(
                'country_code' => 'EG',
                'name' => 'Egypt',
                'states' => array(
                    "Cairo", "Alexandria", "Giza", "Luxor", "Aswan", "Port Said", 
                    "Suez", "Daqahlia", "Kafr El Sheikh", "Sharqia", "Gharbia", 
                    "Monufia", "Beheira", "Minya", "Beni Suef", "Fayoum", "Ismailia", 
                    "North Sinai", "South Sinai", "Red Sea"
                )
            ),
            array(
                'country_code' => 'SV',
                'name' => 'El Salvador',
                'states' => array(
                    "Ahuachapán", "Cabañas", "Chalatenango", "Cuscatlán", "La Libertad", 
                    "La Paz", "La Unión", "Morazán", "San Miguel", "San Salvador", 
                    "San Vicente", "Santa Ana", "Santa Tecla", "Sonsonate", "Usulután"
                )
            ),
            array(
                'country_code' => 'GQ',
                'name' => 'Equatorial Guinea',
                'states' => array(
                    "Bioko Norte", "Bioko Sur", "Centro Sur", "Kie-Ntem", "Litoral", "Wele-Nzas"
                )
            ),
            array(
                'country_code' => 'ER',
                'name' => 'Eritrea',
                'states' => array(
                    "Anseba", "Debub", "Debubawi Keyih Bahri", "Gash-Barka", "Maekel", "Northern Red Sea", "Southern Red Sea"
                )
            ),
            array(
                'country_code' => 'EE',
                'name' => 'Estonia',
                'states' => array(
                    "Harju", "Hiiu", "Ida-Viru", "Igra", "Jõgeva", "Järva", "Lääne", 
                    "Lääne-Viru", "Pärnu", "Rapla", "Saare", "Tartu", "Valga", "Viljandi", 
                    "Võru"
                )
            ),
            array(
                'country_code' => 'ET',
                'name' => 'Ethiopia',
                'states' => array(
                    "Addis Ababa", "Afar", "Amhara", "Benishangul-Gumuz", "Dire Dawa", 
                    "Gambela", "Harari", "Oromia", "Sidama", "Somali", "Southern Nations, Nationalities, and Peoples'"
                )
            ),
            array(
                'country_code' => 'FK',
                'name' => 'Falkland Islands (Malvinas)',
                'states' => array() // Falkland Islands is a single administrative region
            ),
            array(
                'country_code' => 'FJ',
                'name' => 'Fiji',
                'states' => array(
                    "Central", "Eastern", "Northern", "Western"
                )
            ),
            array(
                'country_code' => 'FI',
                'name' => 'Finland',
                'states' => array(
                    "Åland Islands", "Southern Finland", "Western Finland", "Northern Finland"
                )
            ),
            array(
                'country_code' => 'PF',
                'name' => 'French Polynesia',
                'states' => array(
                    "Bougainville", "Gambier", "Marquesas", "Society Islands", "Tuamotu"
                )
            ),
            array(
                'country_code' => 'GA',
                'name' => 'Gabon',
                'states' => array(
                    "Estuaire", "Haut-Ogooué", "Moyen-Ogooué", "Ngounié", "Nyanga", 
                    "Ogooué-Ivindo", "Ogooué-Lolo", "Ogooué-Maritime", "Woleu-Ntem"
                )
            ),
            array(
                'country_code' => 'GM',
                'name' => 'Gambia',
                'states' => array(
                    "Banjul", "Barra", "Brikama", "Kerewan", "Kuntaur", "Mansa Konko", 
                    "Mediina", "Munyama", "Sukuta", "Tallinding", "The Gambia"
                )
            ),
            array(
                'country_code' => 'GE',
                'name' => 'Georgia',
                'states' => array(
                    "Abkhazia", "Ajara", "Guria", "Imereti", "Kakheti", "Kvemo Kartli", 
                    "Mtskheta-Mtianeti", "Racha-Lechkhumi and Kvemo Svaneti", "Samegrelo-Zemo Svaneti", 
                    "Samtskhe-Javakheti", "Shida Kartli", "Tbilisi"
                )
            ),
            array(
                'country_code' => 'GH',
                'name' => 'Ghana',
                'states' => array(
                    "Western", "Central", "Greater Accra", "Eastern", "Volta", "Northern", 
                    "Upper East", "Upper West", "Ashanti", "Western North", "Oti"
                )
            ),
            array(
                'country_code' => 'GI',
                'name' => 'Gibraltar',
                'flag' => 'media/flags/gibraltar.svg',
                'phone_code' => '350',
                'states' => array() // Gibraltar is a single administrative region
            ),
            array(
                'country_code' => 'GR',
                'name' => 'Greece',
                'states' => array(
                    "Athens", "Thessaloniki", "Patras", "Heraklion", "Larissa", "Volos",
                    "Kavala", "Ioannina", "Kalamata", "Rhodes", "Chania", "Kozani", 
                    "Serres", "Tripoli", "Xanthi", "Zante", "Samos", "Mytilene"
                )
            ),
            array(
                'country_code' => 'GL',
                'name' => 'Greenland',
                'states' => array(
                    "Kommuneqarfik Sermersooq", "Qeqqata", "Qaasuitsup", "Kommune Kujalleq"
                )
            ),
            array(
                'country_code' => 'GD',
                'name' => 'Grenada',
                'states' => array() // Grenada is a single administrative region
            ),
            array(
                'country_code' => 'GU',
                'name' => 'Guam',
                'states' => array() // Guam is a single administrative region
            ),
            array(
                'country_code' => 'GT',
                'name' => 'Guatemala',
                'states' => array(
                    "Chimaltenango", "El Progreso", "Escuintla", "Guatemala", "Huehuetenango", 
                    "Izabal", "Jalapa", "Jutiapa", "Petén", "Quetzaltenango", "Quiché", 
                    "Retalhuleu", "San Marcos", "Santa Rosa", "Solalá", "Suchitepéquez", 
                    "Totonicapán", "Zacapa"
                )
            ),
            array(
                'country_code' => 'GG',
                'name' => 'Guernsey',
                'states' => array() // Guernsey is a single administrative region
            ),
            array(
                'country_code' => 'GN',
                'name' => 'Guinea',
                'states' => array(
                    "Boké", "Conakry", "Faranah", "Kankan", "Kindia", "Labé", "Mamou", 
                    "Nzérékoré"
                )
            ),
            array(
                'country_code' => 'GW',
                'name' => 'Guinea-Bissau',
                'states' => array(
                    "Bafatá", "Biombo", "Bissau", "Bolama", "Cacheu", "Oio", "Quinara", "Tombali"
                )
            ),

            array(
                'country_code' => 'HT',
                'name' => 'Haiti',
                'states' => array(
                    "Artibonite", "Centre", "Grand'Anse", "Nippes", "Nord", "Nord-Est", 
                    "Nord-Ouest", "Ouest", "Sud", "Sud-Est"
                )
            ),
            array(
                'country_code' => 'VA',
                'name' => 'Holy See (Vatican City State)',
                'states' => array() // Vatican City is a single administrative region
            ),
            array(
                'country_code' => 'HN',
                'name' => 'Honduras',
                'states' => array(
                    "Atlántida", "Choluteca", "Colón", "Cortés", "Gracias a Dios", 
                    "Islas de la Bahía", "La Paz", "Lempira", "Ocotepeque", "Olancho", 
                    "Santa Bárbara", "Yoro"
                )
            ),
            array(
                'country_code' => 'HK',
                'name' => 'Hong Kong',
                'states' => array() // Hong Kong is a single administrative region
            ),
            array(
                'country_code' => 'HU',
                'name' => 'Hungary',
                'states' => array(
                    "Bács-Kiskun", "Békés", "Borsod-Abaúj-Zemplén", "Budapest", "Csongrád", 
                    "Fejér", "Győr-Moson-Sopron", "Hajdú-Bihar", "Heves", "Jász-Nagykun-Szolnok", 
                    "Komárom-Esztergom", "Nógrád", "Pest", "Somogy", "Szabolcs-Szatmár-Bereg", 
                    "Székesfehérvár", "Tolna", "Vas", "Veszprém", "Zala"
                )
            ),
            array(
                'country_code' => 'IS',
                'name' => 'Iceland',
                'states' => array(
                    "Capital Region", "Southern Peninsula", "Westfjords", "Northeast Iceland", 
                    "Northwest Iceland", "South Iceland", "West Iceland"
                )
            ),
            array(
                'country_code' => 'ID',
                'name' => 'Indonesia',
                'states' => array(
                    "Bali", "Banten", "Bengkulu", "Central Java", "Central Kalimantan", 
                    "Central Sulawesi", "DI Yogyakarta", "East Java", "East Kalimantan", 
                    "East Nusa Tenggara", "Jakarta", "Jambi", "Lampung", "Maluku", 
                    "North Kalimantan", "North Maluku", "North Sulawesi", "North Sumatra", 
                    "Papua", "Riau", "Riau Islands", "South Kalimantan", "South Sulawesi", 
                    "South Sumatra", "West Java", "West Kalimantan", "West Nusa Tenggara", 
                    "West Papua", "West Sulawesi", "West Sumatra"
                )
            ),
            array(
                'country_code' => 'IR',
                'name' => 'Iran, Islamic Republic of',
                'states' => array(
                    "Alborz", "Ardabil", "Bushehr", "Chaharmahal and Bakhtiari", "East Azerbaijan", 
                    "Esfahan", "Fars", "Gilan", "Golestan", "Hamadan", "Hormozgan", "Ilam", 
                    "Kerman", "Kermanshah", "Khuzestan", "Kohgiluyeh and Boyer-Ahmad", "Kurdistan", 
                    "Lorestan", "Markazi", "Mazandaran", "North Khorasan", "Qazvin", "Qom", 
                    "Razavi Khorasan", "Semnan", "Sistan and Baluchestan", "South Khorasan", 
                    "Tehran", "Yazd", "Zanjan"
                )
            ),
            array(
                'country_code' => 'IQ',
                'name' => 'Iraq',
                'states' => array(
                    "Anbar", "Baghdad", "Basra", "Dhi Qar", "Diyala", "Karbala", "Kirkuk", 
                    "Muthanna", "Najaf", "Nineveh", "Qadisiyyah", "Salah ad Din", "Wasit"
                )
            ),
            array(
                'country_code' => 'IE',
                'name' => 'Ireland',
                'states' => array(
                    "Carlow", "Cavan", "Clare", "Cork", "Donegal", "Dublin", "Galway", 
                    "Kerry", "Kildare", "Kilkenny", "Laois", "Leitrim", "Limerick", 
                    "Longford", "Louth", "Mayo", "Meath", "Monaghan", "Offaly", "Roscommon", 
                    "Sligo", "Tipperary", "Waterford", "Westmeath", "Wexford", "Wicklow"
                )
            ),
            array(
                'country_code' => 'IM',
                'name' => 'Isle of Man',
                'states' => array() // Isle of Man is a single administrative region
            ),
            array(
                'country_code' => 'IL',
                'name' => 'Israel',
                'states' => array(
                    "Central District", "Haifa", "Jerusalem", "Northern District", "Southern District", 
                    "Tel Aviv"
                )
            ),
            array(
                'country_code' => 'JM',
                'name' => 'Jamaica',
                'states' => array(
                    "Clarendon", "Hanover", "Kingston", "Manchester", "Portland", 
                    "Saint Andrew", "Saint Ann", "Saint Catherine", "Saint Elizabeth", 
                    "Saint James", "Saint Mary", "Saint Thomas", "Trelawny", "Westmoreland"
                )
            ),
            array(
                'country_code' => 'JE',
                'name' => 'Jersey',
                'states' => array() // Jersey is a single administrative region
            ),
            array(
                'country_code' => 'JO',
                'name' => 'Jordan',
                'states' => array(
                    "Ajloun", "Amman", "Az Zarqa", "Balqa", "Irbid", "Jerash", 
                    "Karak", "Maan", "Madaba", "Tafilah", "Mafraq"
                )
            ),
            array(
                'country_code' => 'KZ',
                'name' => 'Kazakhstan',
                'states' => array(
                    "Akmola", "Aktobe", "Almaty", "Atyrau", "East Kazakhstan", 
                    "Karaganda", "Kostanay", "Kyzylorda", "Mangystau", "North Kazakhstan", 
                    "Pavlodar", "South Kazakhstan", "West Kazakhstan", "Zhambyl"
                )
            ),
            array(
                'country_code' => 'KE',
                'name' => 'Kenya',
                'states' => array(
                    "Bomet", "Bungoma", "Busia", "Elgeyo-Marakwet", "Embu", 
                    "Garissa", "Homa Bay", "Isiolo", "Kajiado", "Kakamega", 
                    "Kericho", "Kerugoya", "Kilifi", "Kirinyaga", "Kisii", 
                    "Kisumu", "Kitui", "Kwale", "Laikipia", "Lamu", 
                    "Machakos", "Makueni", "Mandera", "Marsabit", "Meru", 
                    "Migori", "Mombasa", "Murang'a", "Nairobi", "Nakuru", 
                    "Narok", "Nairobi", "Nandi", "Narok", "Nyamira", 
                    "Nyandarua", "Nyeri", "Samburu", "Siaya", "Taita Taveta", 
                    "Tana River", "Tharaka Nithi", "Trans Nzoia", "Turkana", 
                    "Uasin Gishu", "Vihiga", "Wajir", "West Pokot", 
                    "Wote"
                )
            ),
            array(
                'country_code' => 'KI',
                'name' => 'Kiribati',
                'states' => array(
                    "Banaba", "Caroline Islands", "Central Pacific", "Kiritimati", 
                    "Northern Kiribati", "Southern Kiribati", "Tabiteuea", "Tarawa"
                )
            ),
            array(
                'country_code' => 'KP',
                'name' => 'Korea, Democratic People\'s Republic of',
                'states' => array(
                    "Chagang", "Hamgyong", "Hwanghae", "Kangwon", "North Pyongan", 
                    "North Hamgyong", "Ryanggang", "South Pyongan", "South Hamgyong", 
                    "Pyongyang"
                )
            ),
            array(
                'country_code' => 'KW',
                'name' => 'Kuwait',
                'states' => array(
                    "Ahmadi", "Hawalli", "Jahra", "Kuwait City", "Mubarak Al-Kabeer"
                )
            ),
            array(
                'country_code' => 'KG',
                'name' => 'Kyrgyzstan',
                'states' => array(
                    "Batken", "Bishkek", "Chui", "Jalal-Abad", "Naryn", 
                    "Osh", "Talas", "Ysyk-Köl"
                )
            ),
            array(
                'country_code' => 'LA',
                'name' => 'Lao People\'s Democratic Republic',
                'states' => array(
                    "Attapeu", "Bolikhamsai", "Champasak", "Houaphanh", "Khammouane", 
                    "Oudomxay", "Phongsaly", "Salavan", "Savannakhet", "Vientiane", 
                    "Xaignabouli", "Xaisomboun", "Xayaburi", "Xieng Khouang", "Vientiane Province"
                )
            ),
            array(
                'country_code' => 'LV',
                'name' => 'Latvia',
                'states' => array(
                    "Aglona", "Alūksne", "Balvi", "Bauska", "Cēsis", "Daugavpils", 
                    "Dobele", "Jelgava", "Jūrmala", "Liepāja", "Limbazi", "Riga", 
                    "Rūjiena", "Talsi", "Tukums", "Ventspils"
                )
            ),
            array(
                'country_code' => 'LB',
                'name' => 'Lebanon',
                'states' => array(
                    "Beirut", "Mount Lebanon", "Nabatieh", "North Governorate", "South Governorate"
                )
            ),
            array(
                'country_code' => 'LS',
                'name' => 'Lesotho',
                'states' => array(
                    "Berea", "Butha-Buthe", "Leribe", "Mafeteng", "Maseru", "Mohale's Hoek", 
                    "Mokhotlong", "Qacha's Nek", "Quthing", "Thabane"
                )
            ),
            array(
                'country_code' => 'LR',
                'name' => 'Liberia',
                'states' => array(
                    "Bong", "Bomi", "Bong", "Grand Bassa", "Grand Cape Mount", 
                    "Grand Gedeh", "Grand Kru", "Lofa", "Margibi", "Maryland", 
                    "Montserrado", "Nimba", "River Cess", "River Gee", "Sinoe"
                )
            ),
            array(
                'country_code' => 'LY',
                'name' => 'Libya',
                'states' => array(
                    "Ajdabiya", "Al Bayda", "Al Khums", "Al Marj", "Al Wahat", "Benghazi", 
                    "Derna", "Ghat", "Ghadames", "Misrata", "Sebha", "Surt", "Tripoli", 
                    "Ubari", "Zawiya", "Zliten"
                )
            ),
            array(
                'country_code' => 'LI',
                'name' => 'Liechtenstein',
                'states' => array() // Liechtenstein is a single administrative region
            ),
            array(
                'country_code' => 'LT',
                'name' => 'Lithuania',
                'states' => array(
                    "Alytus", "Kaunas", "Klaipeda", "Marijampolė", "Panevėžys", 
                    "Šiauliai", "Vilnius"
                )
            ),
            array(
                'country_code' => 'LU',
                'name' => 'Luxembourg',
                'states' => array() // Luxembourg is a single administrative region
            ),
            array(
                'country_code' => 'QA',
                'name' => 'Qatar',
                'states' => array() // Qatar is a single administrative region
            ),
            array(
                'country_code' => 'RO',
                'name' => 'Romania',
                'states' => array(
                    "Bacău", "Bihor", "Bistrița-Năsăud", "Botoșani", "Brașov", 
                    "Brăila", "Buzău", "Călărași", "Cluj", "Constanța", 
                    "Covasna", "Dâmbovița", "Dolj", "Gorj", "Harghita", 
                    "Hunedoara", "Ialomița", "Iași", "Ilfov", "Maramureș", 
                    "Mehedinți", "Mureș", "Neamț", "Olt", "Prahova", 
                    "Sălaj", "Satu Mare", "Sibiu", "Suceava", "Teleorman", 
                    "Timiș", "Tulcea", "Vaslui", "Vâlcea", "Vrancea", 
                    "Bucharest"
                )
            ),
            array(
                'country_code' => 'RU',
                'name' => 'Russian Federation',
                'states' => array(
                    "Adygea", "Altai", "Altai Republic", "Amur", "Arkhangelsk", 
                    "Astrakhan", "Bashkortostan", "Belgorod", "Bryansk", "Buryatia", 
                    "Chechen", "Chelyabinsk", "Chukchi", "Chuvash", "Dagestan", 
                    "Ingushetia", "Irkutsk", "Ivanovo", "Kabardino-Balkar", "Kaliningrad", 
                    "Kalmykia", "Kaluga", "Kamchatka", "Karachay-Cherkess", "Kemerovo", 
                    "Khabarovsk", "Khakassia", "Khmelnitsky", "Kirov", "Kostroma", 
                    "Krasnodar", "Krasnoyarsk", "Kurgan", "Kursk", "Leningrad", 
                    "Lipetsk", "Magadan", "Mari El", "Moscow", "Moscow Oblast", 
                    "Murmansk", "Nizhny Novgorod", "North Ossetia", "Novgorod", "Novosibirsk", 
                    "Omsk", "Orenburg", "Orlov", "Penza", "Perm", "Primorsky", 
                    "Pskov", "Rostov", "Ryazan", "Saint Petersburg", "Sakha", 
                    "Sakhalin", "Samara", "Saratov", "Smolensk", "Stavropol", 
                    "Sverdlovsk", "Tambov", "Tatarstan", "Tomsk", "Tula", 
                    "Tver", "Tyumen", "Udmurt", "Ulyanovsk", "Vladimir", 
                    "Volgograd", "Vologda", "Voronezh", "Yamal", "Yaroslavl"
                )
            ),
            array(
                'country_code' => 'RW',
                'name' => 'Rwanda',
                'states' => array(
                    "Bugesera", "Burera", "Byumba", "Gakenke", "Gicumbi", 
                    "Gisagara", "Huye", "Kamonyi", "Karongi", "Kayonza", 
                    "Kigali", "Kirehe", "Musanze", "Ngoma", "Ngororero", 
                    "Nyarugenge", "Nyamagabe", "Nyamasheke", "Nyandungu", "Nyaruguru", 
                    "Rutsiro", "Rwanda", "Ruhango", "Rusizi", "Rwanda", 
                    "Gakenke", "Kigali", "Kigali City"
                )
            ),
            array(
                'country_code' => 'BL',
                'name' => 'Saint Barthélemy',
                'states' => array() // Saint Barthélemy is a single administrative region
            ),
            array(
                'country_code' => 'KN',
                'name' => 'Saint Kitts and Nevis',
                'states' => array(
                    "Saint George Basseterre", "Saint George Gingerland", 
                    "Saint James Windward", "Saint John Capisterre", 
                    "Saint John Figtree", "Saint Kitts", "Saint Mary Cayon", 
                    "Saint Paul Capisterre", "Saint Paul Charlestown", 
                    "Saint Peter", "Saint Thomas Lowland", "Saint Thomas Middle"
                )
            ),
            array(
                'country_code' => 'LC',
                'name' => 'Saint Lucia',
                'states' => array(
                    "Castries", "Choiseul", "Dennery", "Gros Islet", 
                    "Laborie", "Micoud", "Soufrière", "Vieux Fort"
                )
            ),
            array(
                'country_code' => 'MF',
                'name' => 'Saint Martin (French part)',
                'states' => array() // Saint Martin is a single administrative region
            ),
            array(
                'country_code' => 'PM',
                'name' => 'Saint Pierre and Miquelon',
                'phone_code' => '508',
                'states' => array() // Saint Pierre and Miquelon is a single administrative region
            ),
            array(
                'country_code' => 'VC',
                'name' => 'Saint Vincent and the Grenadines',
                'states' => array(
                    "Charlotte", "Grenadines", "Saint Andrew", "Saint David", 
                    "Saint George", "Saint Patrick"
                )
            ),
            array(
                'country_code' => 'WS',
                'name' => 'Samoa',
                'states' => array() // Samoa is a single administrative region
            ),
            array(
                'country_code' => 'SM',
                'name' => 'San Marino',
                'states' => array(
                    "Acquaviva", "Borgo Maggiore", "Chiesanuova", "Domagnano", 
                    "Faetano", "Fiorentino", "Montegiardino", "San Marino", 
                    "Serravalle"
                )
            ),
            array(
                'country_code' => 'ST',
                'name' => 'Sao Tome and Principe',
                'states' => array(
                    "Água Grande", "Caué", "Lemba", "Lagoa", "Me-Zóchi", 
                    "Pagué", "Príncipe", "Ribéira Peixe", "São Tomé", "Vila de Nogueira"
                )
            ),
            array(
                'country_code' => 'SA',
                'name' => 'Saudi Arabia',
                'states' => array(
                    "Al Bahah", "Al Hudaydah", "Al Jawf", "Al Madinah", 
                    "Al Qasim", "Ar Riyad", "Asir", "Eastern Province", 
                    "Jizan", "Makkah", "Najran", "Tabuk"
                )
            ),
            array(
                'country_code' => 'SN',
                'name' => 'Senegal',
                'states' => array(
                    "Dakar", "Diourbel", "Fatick", "Kaolack", "Kédougou", 
                    "Kolda", "Louga", "Matam", "Saint-Louis", "Sédhiou", 
                    "Tambacounda", "Thiès", "Ziguinchor"
                )
            ),
            array(
                'country_code' => 'RS',
                'name' => 'Serbia',
                'states' => array(
                    "Belgrade", "Bor", "Zaječar", "Zemun", "Kragujevac", 
                    "Kraljevo", "Leskovac", "Novi Pazar", "Novi Sad", "Pancevo", 
                    "Senta", "Sombor", "Subotica", "Valjevo", "Vranje", 
                    "Vrbas", "Yugoslavia"
                )
            ),
            array(
                'country_code' => 'SC',
                'name' => 'Seychelles',
                'states' => array(
                    "Anse Boileau", "Anse Etoile", "Anse Royale", "Bel Ombre", 
                    "Cascade", "Glacis", "La Digue", "Mont Fleuri", "Pointe Larue", 
                    "Port Glaud", "Saint Louis", "Takamaka"
                )
            ),
            array(
                'country_code' => 'SL',
                'name' => 'Sierra Leone',
                'states' => array(
                    "Bombali", "Bo", "Bonthe", "Kailahun", "Kambia", 
                    "Kenema", "Koinadugu", "Kono", "Port Loko", "Pujehun", 
                    "Tonkolili", "Western Area"
                )
            ),
            array(
                'country_code' => 'SG',
                'name' => 'Singapore',
                'states' => array() // Singapore is a single administrative region
            ),
            array(
                'country_code' => 'SX',
                'name' => 'Sint Maarten (Dutch part)',
                'states' => array() // Sint Maarten is a single administrative region
            ),
            array(
                'country_code' => 'SK',
                'name' => 'Slovakia',
                'states' => array(
                    "Bratislava", "Košice", "Nitra", "Prešov", "Trenčín", 
                    "Trnava"
                )
            ),
            array(
                'country_code' => 'SI',
                'name' => 'Slovenia',
                'states' => array(
                    "Pomurska", "Podravska", "Posavska", "Osrednjeslovenska", 
                    "Savinjska", "Zasavska", "Goriška", "Primorsko-notranjska", 
                    "Koroška", "Slovenj Gradec", "Škofja Loka", "Kranj", "Maribor", 
                    "Ljubljana"
                )
            ),
            array(
                'country_code' => 'SB',
                'name' => 'Solomon Islands',
                'states' => array(
                    "Central", "Choiseul", "Guadalcanal", "Honiara", "Isabel", 
                    "Malaita", "Rennell and Bellona", "Temotu", "Western"
                )
            ),
            array(
                'country_code' => 'SO',
                'name' => 'Somalia',
                'states' => array(
                    "Awdal", "Banadir", "Bari", "Bay", "Bakool", 
                    "Galgaduud", "Gedo", "Hiraan", "Middle Juba", "Middle Shabelle", 
                    "Mudug", "Nugaal", "Sanaag", "Sool", "Woqooyi Galbeed"
                )
            ),
            array(
                'country_code' => 'ZA',
                'name' => 'South Africa',
                'states' => array(
                    "Eastern Cape", "Free State", "Gauteng", "KwaZulu-Natal", 
                    "Limpopo", "Mpumalanga", "Northern Cape", "North West", "Western Cape"
                )
            ),
            array(
                'country_code' => 'KR',
                'name' => 'South Korea',
                'states' => array(
                    "Busan", "Chungbuk", "Chungnam", "Daegu", "Daejeon", 
                    "Gwangju", "Gyeongbuk", "Gyeongnam", "Gyeonggi", "Incheon", 
                    "Jeju", "Jeonbuk", "Jeonnam", "Sejong", "Seoul", 
                    "Ulsan"
                )
            ),
            array(
                'country_code' => 'SS',
                'name' => 'South Sudan',
                'states' => array(
                    "Central Equatoria", "Eastern Equatoria", "Jonglei", 
                    "Lakes", "Northern Bahr el Ghazal", "Unity", "Upper Nile", 
                    "Warrap", "Western Bahr el Ghazal", "Western Equatoria"
                )
            ),
            array(
                'country_code' => 'ES',
                'name' => 'Spain',
                'states' => array(
                    "Andalusia", "Aragon", "Asturias", "Balearic Islands", 
                    "Basque Country", "Canary Islands", "Cantabria", "Castile and León", 
                    "Castile-La Mancha", "Catalonia", "Extremadura", "Galicia", 
                    "La Rioja", "Madrid", "Murcia", "Navarre", "Valencia"
                )
            ),
            array(
                'country_code' => 'LK',
                'name' => 'Sri Lanka',
                'states' => array(
                    "Central", "Eastern", "North Central", "North Eastern", 
                    "North Western", "Sabaragamuwa", "Southern", "Uva", 
                    "Western", "Colombo", "Gampaha", "Kalutara", "Kandy", 
                    "Matale", "Nuwara Eliya", "Puttalam", "Ratnapura", "Trincomalee"
                )
            ),
            array(
                'country_code' => 'SD',
                'name' => 'Sudan',
                'states' => array(
                    "Aali an Nil", "Blue Nile", "Cassala", "Darfur", 
                    "Gezira", "Khartoum", "Kordofan", "North Darfur", 
                    "North Kordofan", "Red Sea", "River Nile", "Sennar", 
                    "Southern Darfur", "Southern Kordofan", "West Darfur", "White Nile"
                )
            ),
            array(
                'country_code' => 'SR',
                'name' => 'Suriname',
                'states' => array(
                    "Brokopondo", "Commewijne", "Coronie", "Marowijne", 
                    "Nickerie", "Para", "Paramaribo", "Saramacca", "Sipaliwini", 
                    "Wanica"
                )
            ),
            array(
                'country_code' => 'SZ',
                'name' => 'Swaziland',
                'states' => array(
                    "Hhohho", "Lubombo", "Manzini", "Shiselweni"
                )
            ),
            array(
                'country_code' => 'SE',
                'name' => 'Sweden',
                'flag' => 'media/flags/sweden.svg',
                'phone_code' => '46',
                'states' => array(
                    "Blekinge", "Dalarna", "Gotland", "Gävleborg", "Halland", 
                    "Jämtland", "Jönköping", "Kalmar", "Kronoberg", "Norrbotten", 
                    "Örebro", "Östergötland", "Stockholm", "Södermanland", 
                    "Uppsala", "Värmland", "Västerbotten", "Västernorrland", 
                    "Västmanland", "Västra Götaland"
                )
            ),
            array(
                'country_code' => 'CH',
                'name' => 'Switzerland',
                'states' => array(
                    "Aargau", "Appenzell Ausserrhoden", "Appenzell Innerrhoden", 
                    "Basel-Landschaft", "Basel-Stadt", "Bern", "Fribourg", 
                    "Geneva", "Glarus", "Graubünden", "Jura", "Lucerne", 
                    "Neuchâtel", "Nidwalden", "Obwalden", "Schaffhausen", 
                    "Schwyz", "Solothurn", "St. Gallen", "Thurgau", "Ticino", 
                    "Uri", "Valais", "Vaud", "Zug", "Zurich"
                )
            ),
            array(
                'country_code' => 'SY',
                'name' => 'Syrian Arab Republic',
                'states' => array(
                    "Aleppo", "Al-Hasakah", "Al-Raqqah", "Damascus", 
                    "Daraa", "Deir ez-Zor", "Hama", "Homs", "Idlib", 
                    "Quneitra", "Rural Damascus", "Tartus"
                )
            ),
            

        );

        foreach ($states as $country) {
            $country_id = Country::where('name', $country['name'])->first();
            foreach ($country['states'] as $state) {
                $data = [
                    'country_id' => $country_id ? $country_id->id : null, 
                    'name' => $state 
                ];
                
                
                DB::table('states')->insert($data);
            }
        }
    }
}
