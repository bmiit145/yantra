<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['code' => 'AU', 'name' => 'Australia', 'flag' => 'media/flags/australia.svg','phone_code' =>'61'],
            ['code' => 'AF', 'name' => 'Afghanistan', 'flag' => 'media/flags/afghanistan.svg','phone_code'=>'93'],
            ['code' => 'AX', 'name' => 'Aland Islands', 'flag' => 'media/flags/aland-islands.svg','phone_code'=>'358'],
            ['code' => 'AL', 'name' => 'Albania', 'flag' => 'media/flags/albania.svg','phone_code'=>'355'],
            ['code' => 'DZ', 'name' => 'Algeria', 'flag' => 'media/flags/algeria.svg','phone_code'=>'213'],
            ['code' => 'AS', 'name' => 'American Samoa', 'flag' => 'media/flags/american-samoa.svg','phone_code'=>'1'],
            ['code' => 'AD', 'name' => 'Andorra', 'flag' => 'media/flags/andorra.svg','phone_code'=>'376'],
            ['code' => 'AO', 'name' => 'Angola', 'flag' => 'media/flags/angola.svg','phone_code'=>'244'],
            ['code' => 'AI', 'name' => 'Anguilla', 'flag' => 'media/flags/anguilla.svg','phone_code'=>'1'],
            ['code' => 'AG', 'name' => 'Antigua and Barbuda', 'flag' => 'media/flags/antigua-and-barbuda.svg','phone_code'=>'1'],
            ['code' => 'AR', 'name' => 'Argentina', 'flag' => 'media/flags/argentina.svg','phone_code'=>'54'],
            ['code' => 'AM', 'name' => 'Armenia', 'flag' => 'media/flags/armenia.svg','phone_code'=>'374'],
            ['code' => 'AW', 'name' => 'Aruba', 'flag' => 'media/flags/aruba.svg','phone_code'=>'297'],
            ['code' => 'AT', 'name' => 'Austria', 'flag' => 'media/flags/austria.svg','phone_code'=>'43'],
            ['code' => 'AZ', 'name' => 'Azerbaijan', 'flag' => 'media/flags/azerbaijan.svg','phone_code'=>'994'],
            ['code' => 'BS', 'name' => 'Bahamas', 'flag' => 'media/flags/bahamas.svg','phone_code'=>'1'],
            ['code' => 'BH', 'name' => 'Bahrain', 'flag' => 'media/flags/bahrain.svg','phone_code'=>'973'],
            ['code' => 'BD', 'name' => 'Bangladesh', 'flag' => 'media/flags/bangladesh.svg','phone_code'=>'880'],
            ['code' => 'BB', 'name' => 'Barbados', 'flag' => 'media/flags/barbados.svg','phone_code'=>'1'],
            ['code' => 'BY', 'name' => 'Belarus', 'flag' => 'media/flags/belarus.svg','phone_code'=>'375'],
            ['code' => 'BE', 'name' => 'Belgium', 'flag' => 'media/flags/belgium.svg','phone_code'=>'32'],
            ['code' => 'BZ', 'name' => 'Belize', 'flag' => 'media/flags/belize.svg','phone_code'=>'501'],
            ['code' => 'BJ', 'name' => 'Benin', 'flag' => 'media/flags/benin.svg','phone_code'=>'229'],
            ['code' => 'BM', 'name' => 'Bermuda', 'flag' => 'media/flags/bermuda.svg','phone_code'=>'1'],
            ['code' => 'BT', 'name' => 'Bhutan', 'flag' => 'media/flags/bhutan.svg','phone_code'=>'975'],
            ['code' => 'BO', 'name' => 'Bolivia, Plurinational State of', 'flag' => 'media/flags/bolivia.svg','phone_code'=>'591'],
            ['code' => 'BQ', 'name' => 'Bonaire, Sint Eustatius and Saba', 'flag' => 'media/flags/bonaire.svg','phone_code'=>'599'],
            ['code' => 'BA', 'name' => 'Bosnia and Herzegovina', 'flag' => 'media/flags/bosnia-and-herzegovina.svg','phone_code'=>'387'],
            ['code' => 'BW', 'name' => 'Botswana', 'flag' => 'media/flags/botswana.svg','phone_code'=>'267'],
            ['code' => 'BR', 'name' => 'Brazil', 'flag' => 'media/flags/brazil.svg','phone_code'=>'55'],
            ['code' => 'IO', 'name' => 'British Indian Ocean Territory', 'flag' => 'media/flags/british-indian-ocean-territory.svg','phone_code'=>'246'],
            ['code' => 'BN', 'name' => 'Brunei Darussalam', 'flag' => 'media/flags/brunei.svg','phone_code'=>'673'],
            ['code' => 'BG', 'name' => 'Bulgaria', 'flag' => 'media/flags/bulgaria.svg','phone_code'=>'359'],
            ['code' => 'BF', 'name' => 'Burkina Faso', 'flag' => 'media/flags/burkina-faso.svg','phone_code'=>'226'],
            ['code' => 'BI', 'name' => 'Burundi', 'flag' => 'media/flags/burundi.svg','phone_code'=>'257'],
            ['code' => 'KH', 'name' => 'Cambodia', 'flag' => 'media/flags/cambodia.svg','phone_code'=>'855'],
            ['code' => 'CM', 'name' => 'Cameroon', 'flag' => 'media/flags/cameroon.svg','phone_code'=>'237'],
            ['code' => 'CA', 'name' => 'Canada', 'flag' => 'media/flags/canada.svg','phone_code'=>'1'],
            ['code' => 'CV', 'name' => 'Cape Verde', 'flag' => 'media/flags/cape-verde.svg','phone_code'=>'238'],
            ['code' => 'KY', 'name' => 'Cayman Islands', 'flag' => 'media/flags/cayman-islands.svg','phone_code'=>'1'],
            ['code' => 'CF', 'name' => 'Central African Republic', 'flag' => 'media/flags/central-african-republic.svg','phone_code'=>'236'],
            ['code' => 'TD', 'name' => 'Chad', 'flag' => 'media/flags/chad.svg','phone_code'=>'235'],
            ['code' => 'CL', 'name' => 'Chile', 'flag' => 'media/flags/chile.svg','phone_code'=>'56'],
            ['code' => 'CN', 'name' => 'China', 'flag' => 'media/flags/china.svg','phone_code'=>'86'],
            ['code' => 'CX', 'name' => 'Christmas Island', 'flag' => 'media/flags/christmas-island.svg','phone_code'=>'61'],
            ['code' => 'CC', 'name' => 'Cocos (Keeling) Islands', 'flag' => 'media/flags/cocos-island.svg','phone_code'=>'61'],
            ['code' => 'CO', 'name' => 'Colombia', 'flag' => 'media/flags/colombia.svg','phone_code'=>'57'],
            ['code' => 'KM', 'name' => 'Comoros', 'flag' => 'media/flags/comoros.svg','phone_code'=>'269'],
            ['code' => 'CK', 'name' => 'Cook Islands', 'flag' => 'media/flags/cook-islands.svg','phone_code'=>'682'],
            ['code' => 'CR', 'name' => 'Costa Rica', 'flag' => 'media/flags/costa-rica.svg','phone_code'=>'506'],
            ['code' => 'CI', 'name' => 'Côte d\'Ivoire', 'flag' => 'media/flags/ivory-coast.svg','phone_code'=>'225'],
            ['code' => 'HR', 'name' => 'Croatia', 'flag' => 'media/flags/croatia.svg','phone_code'=>'385'],
            ['code' => 'CU', 'name' => 'Cuba', 'flag' => 'media/flags/cuba.svg','phone_code'=>'53'],
            ['code' => 'CW', 'name' => 'Curaçao', 'flag' => 'media/flags/curacao.svg','phone_code'=>'599'],
            ['code' => 'CZ', 'name' => 'Czech Republic', 'flag' => 'media/flags/czech-republic.svg','phone_code'=>'420'],
            ['code' => 'DK', 'name' => 'Denmark', 'flag' => 'media/flags/denmark.svg','phone_code'=>'45'],
            ['code' => 'DJ', 'name' => 'Djibouti', 'flag' => 'media/flags/djibouti.svg','phone_code'=>'253'],
            ['code' => 'DM', 'name' => 'Dominica', 'flag' => 'media/flags/dominica.svg','phone_code'=>'1'],
            ['code' => 'DO', 'name' => 'Dominican Republic', 'flag' => 'media/flags/dominican-republic.svg','phone_code'=>'1'],
            ['code' => 'EC', 'name' => 'Ecuador', 'flag' => 'media/flags/ecuador.svg','phone_code'=>'593'],
            ['code' => 'EG', 'name' => 'Egypt', 'flag' => 'media/flags/egypt.svg','phone_code'=>'20'],
            ['code' => 'SV', 'name' => 'El Salvador', 'flag' => 'media/flags/el-salvador.svg','phone_code'=>'503'],
            ['code' => 'GQ', 'name' => 'Equatorial Guinea', 'flag' => 'media/flags/equatorial-guinea.svg','phone_code'=>'240'],
            ['code' => 'ER', 'name' => 'Eritrea', 'flag' => 'media/flags/eritrea.svg','phone_code'=>'291'],
            ['code' => 'EE', 'name' => 'Estonia', 'flag' => 'media/flags/estonia.svg','phone_code'=>'372'],
            ['code' => 'ET', 'name' => 'Ethiopia', 'flag' => 'media/flags/ethiopia.svg','phone_code'=>'251'],
            ['code' => 'FK', 'name' => 'Falkland Islands (Malvinas)', 'flag' => 'media/flags/falkland-islands.svg','phone_code'=>'500'],
            ['code' => 'FJ', 'name' => 'Fiji', 'flag' => 'media/flags/fiji.svg','phone_code'=>'679'],
            ['code' => 'FI', 'name' => 'Finland', 'flag' => 'media/flags/finland.svg','phone_code'=>'358'],
            ['code' => 'FR', 'name' => 'France', 'flag' => 'media/flags/france.svg','phone_code'=>'33'],
            ['code' => 'PF', 'name' => 'French Polynesia', 'flag' => 'media/flags/french-polynesia.svg','phone_code'=>'689'],
            ['code' => 'GA', 'name' => 'Gabon', 'flag' => 'media/flags/gabon.svg','phone_code'=>'241'],
            ['code' => 'GM', 'name' => 'Gambia', 'flag' => 'media/flags/gambia.svg','phone_code'=>'220'],
            ['code' => 'GE', 'name' => 'Georgia', 'flag' => 'media/flags/georgia.svg','phone_code'=>'995'],
            ['code' => 'DE', 'name' => 'Germany', 'flag' => 'media/flags/germany.svg','phone_code'=>'49'],
            ['code' => 'GH', 'name' => 'Ghana', 'flag' => 'media/flags/ghana.svg','phone_code'=>'233'],
            ['code' => 'GI', 'name' => 'Gibraltar', 'flag' => 'media/flags/gibraltar.svg','phone_code'=>'350'],
            ['code' => 'GR', 'name' => 'Greece', 'flag' => 'media/flags/greece.svg','phone_code'=>'30'],
            ['code' => 'GL', 'name' => 'Greenland', 'flag' => 'media/flags/greenland.svg','phone_code'=>'299'],
            ['code' => 'GD', 'name' => 'Grenada', 'flag' => 'media/flags/grenada.svg','phone_code'=>'1'],
            ['code' => 'GU', 'name' => 'Guam', 'flag' => 'media/flags/guam.svg','phone_code'=>'1'],
            ['code' => 'GT', 'name' => 'Guatemala', 'flag' => 'media/flags/guatemala.svg','phone_code'=>'502'],
            ['code' => 'GG', 'name' => 'Guernsey', 'flag' => 'media/flags/guernsey.svg','phone_code'=>'44'],
            ['code' => 'GN', 'name' => 'Guinea', 'flag' => 'media/flags/guinea.svg','phone_code'=>'224'],
            ['code' => 'GW', 'name' => 'Guinea-Bissau', 'flag' => 'media/flags/guinea-bissau.svg','phone_code'=>'245'],
            ['code' => 'HT', 'name' => 'Haiti', 'flag' => 'media/flags/haiti.svg','phone_code'=>'509'],
            ['code' => 'VA', 'name' => 'Holy See (Vatican City State)', 'flag' => 'media/flags/vatican-city.svg','phone_code'=>'379 '],
            ['code' => 'HN', 'name' => 'Honduras', 'flag' => 'media/flags/honduras.svg','phone_code'=>'504'],
            ['code' => 'HK', 'name' => 'Hong Kong', 'flag' => 'media/flags/hong-kong.svg','phone_code'=>'852'],
            ['code' => 'HU', 'name' => 'Hungary', 'flag' => 'media/flags/hungary.svg','phone_code'=>'36'],
            ['code' => 'IS', 'name' => 'Iceland', 'flag' => 'media/flags/iceland.svg','phone_code'=>'354'],
            ['code' => 'IN', 'name' => 'India', 'flag' => 'media/flags/india.svg','phone_code'=>'91'],
            ['code' => 'ID', 'name' => 'Indonesia', 'flag' => 'media/flags/indonesia.svg','phone_code'=>'62'],
            ['code' => 'IR', 'name' => 'Iran, Islamic Republic of', 'flag' => 'media/flags/iran.svg','phone_code'=>'98'],
            ['code' => 'IQ', 'name' => 'Iraq', 'flag' => 'media/flags/iraq.svg','phone_code'=>'964'],
            ['code' => 'IE', 'name' => 'Ireland', 'flag' => 'media/flags/ireland.svg','phone_code'=>'353'],
            ['code' => 'IM', 'name' => 'Isle of Man', 'flag' => 'media/flags/isle-of-man.svg','phone_code'=>'44'],
            ['code' => 'IL', 'name' => 'Israel', 'flag' => 'media/flags/israel.svg','phone_code'=>'972'],
            ['code' => 'IT', 'name' => 'Italy', 'flag' => 'media/flags/italy.svg','phone_code'=>'39'],
            ['code' => 'JM', 'name' => 'Jamaica', 'flag' => 'media/flags/jamaica.svg','phone_code'=>'1'],
            ['code' => 'JP', 'name' => 'Japan', 'flag' => 'media/flags/japan.svg','phone_code'=>'81'],
            ['code' => 'JE', 'name' => 'Jersey', 'flag' => 'media/flags/jersey.svg','phone_code'=>'44'],
            ['code' => 'JO', 'name' => 'Jordan', 'flag' => 'media/flags/jordan.svg','phone_code'=>'962'],
            ['code' => 'KZ', 'name' => 'Kazakhstan', 'flag' => 'media/flags/kazakhstan.svg','phone_code'=>'7'],
            ['code' => 'KE', 'name' => 'Kenya', 'flag' => 'media/flags/kenya.svg','phone_code'=>'254'],
            ['code' => 'KI', 'name' => 'Kiribati', 'flag' => 'media/flags/kiribati.svg','phone_code'=>'686'],
            ['code' => 'KP', 'name' => 'Korea, Democratic People\'s Republic of', 'flag' => 'media/flags/north-korea.svg','phone_code'=>'850'],
            ['code' => 'KW', 'name' => 'Kuwait', 'flag' => 'media/flags/kuwait.svg','phone_code'=>'965'],
            ['code' => 'KG', 'name' => 'Kyrgyzstan', 'flag' => 'media/flags/kyrgyzstan.svg','phone_code'=>'996'],
            ['code' => 'LA', 'name' => 'Lao People\'s Democratic Republic', 'flag' => 'media/flags/laos.svg','phone_code'=>'856'],
            ['code' => 'LV', 'name' => 'Latvia', 'flag' => 'media/flags/latvia.svg','phone_code'=>'371'],
            ['code' => 'LB', 'name' => 'Lebanon', 'flag' => 'media/flags/lebanon.svg','phone_code'=>'961'],
            ['code' => 'LS', 'name' => 'Lesotho', 'flag' => 'media/flags/lesotho.svg','phone_code'=>'266'],
            ['code' => 'LR', 'name' => 'Liberia', 'flag' => 'media/flags/liberia.svg','phone_code'=>'231'],
            ['code' => 'LY', 'name' => 'Libya', 'flag' => 'media/flags/libya.svg','phone_code'=>'218'],
            ['code' => 'LI', 'name' => 'Liechtenstein', 'flag' => 'media/flags/liechtenstein.svg','phone_code'=>'423'],
            ['code' => 'LT', 'name' => 'Lithuania', 'flag' => 'media/flags/lithuania.svg','phone_code'=>'370'],
            ['code' => 'LU', 'name' => 'Luxembourg', 'flag' => 'media/flags/luxembourg.svg','phone_code'=>'352'],
            ['code' => 'MO', 'name' => 'Macao', 'flag' => 'media/flags/macao.svg','phone_code'=>'853'],
            ['code' => 'MG', 'name' => 'Madagascar', 'flag' => 'media/flags/madagascar.svg','phone_code'=>'261'],
            ['code' => 'MW', 'name' => 'Malawi', 'flag' => 'media/flags/malawi.svg','phone_code'=>'265'],
            ['code' => 'MY', 'name' => 'Malaysia', 'flag' => 'media/flags/malaysia.svg','phone_code'=>'60'],
            ['code' => 'MV', 'name' => 'Maldives', 'flag' => 'media/flags/maldives.svg','phone_code'=>'960'],
            ['code' => 'ML', 'name' => 'Mali', 'flag' => 'media/flags/mali.svg','phone_code'=>'223'],
            ['code' => 'MT', 'name' => 'Malta', 'flag' => 'media/flags/malta.svg','phone_code'=>'356'],
            ['code' => 'MH', 'name' => 'Marshall Islands', 'flag' => 'media/flags/marshall-island.svg','phone_code'=>'692'],
            ['code' => 'MQ', 'name' => 'Martinique', 'flag' => 'media/flags/martinique.svg','phone_code'=>'596'],
            ['code' => 'MR', 'name' => 'Mauritania', 'flag' => 'media/flags/mauritania.svg','phone_code'=>'222'],
            ['code' => 'MU', 'name' => 'Mauritius', 'flag' => 'media/flags/mauritius.svg','phone_code'=>'230'],
            ['code' => 'MX', 'name' => 'Mexico', 'flag' => 'media/flags/mexico.svg','phone_code'=>'52'],
            ['code' => 'FM', 'name' => 'Micronesia, Federated States of', 'flag' => 'media/flags/micronesia.svg','phone_code'=>'691'],
            ['code' => 'MD', 'name' => 'Moldova, Republic of', 'flag' => 'media/flags/moldova.svg','phone_code'=>'373'],
            ['code' => 'MC', 'name' => 'Monaco', 'flag' => 'media/flags/monaco.svg','phone_code'=>'377'],
            ['code' => 'MN', 'name' => 'Mongolia', 'flag' => 'media/flags/mongolia.svg','phone_code'=>'976'],
            ['code' => 'ME', 'name' => 'Montenegro', 'flag' => 'media/flags/montenegro.svg','phone_code'=>'382'],
            ['code' => 'MS', 'name' => 'Montserrat', 'flag' => 'media/flags/montserrat.svg','phone_code'=>'1'],
            ['code' => 'MA', 'name' => 'Morocco', 'flag' => 'media/flags/morocco.svg','phone_code'=>'212'],
            ['code' => 'MZ', 'name' => 'Mozambique', 'flag' => 'media/flags/mozambique.svg','phone_code'=>'258'],
            ['code' => 'MM', 'name' => 'Myanmar', 'flag' => 'media/flags/myanmar.svg','phone_code'=>'95'],
            ['code' => 'NA', 'name' => 'Namibia', 'flag' => 'media/flags/namibia.svg','phone_code'=>'264'],
            ['code' => 'NR', 'name' => 'Nauru', 'flag' => 'media/flags/nauru.svg','phone_code'=>'674'],
            ['code' => 'NP', 'name' => 'Nepal', 'flag' => 'media/flags/nepal.svg','phone_code'=>'977'],
            ['code' => 'NL', 'name' => 'Netherlands', 'flag' => 'media/flags/netherlands.svg','phone_code'=>'31'],
            ['code' => 'NZ', 'name' => 'New Zealand', 'flag' => 'media/flags/new-zealand.svg','phone_code'=>'64'],
            ['code' => 'NI', 'name' => 'Nicaragua', 'flag' => 'media/flags/nicaragua.svg','phone_code'=>'505'],
            ['code' => 'NE', 'name' => 'Niger', 'flag' => 'media/flags/niger.svg','phone_code'=>'227'],
            ['code' => 'NG', 'name' => 'Nigeria', 'flag' => 'media/flags/nigeria.svg','phone_code'=>'234'],
            ['code' => 'NU', 'name' => 'Niue', 'flag' => 'media/flags/niue.svg','phone_code'=>'683'],
            ['code' => 'NF', 'name' => 'Norfolk Island', 'flag' => 'media/flags/norfolk-island.svg','phone_code'=>'672'],
            ['code' => 'MP', 'name' => 'Northern Mariana Islands', 'flag' => 'media/flags/northern-mariana-islands.svg','phone_code'=>'1'],
            ['code' => 'NO', 'name' => 'Norway', 'flag' => 'media/flags/norway.svg','phone_code'=>'47'],
            ['code' => 'OM', 'name' => 'Oman', 'flag' => 'media/flags/oman.svg','phone_code'=>'968'],
            ['code' => 'PK', 'name' => 'Pakistan', 'flag' => 'media/flags/pakistan.svg','phone_code'=>'92'],
            ['code' => 'PW', 'name' => 'Palau', 'flag' => 'media/flags/palau.svg','phone_code'=>'680'],
            ['code' => 'PS', 'name' => 'Palestinian Territory, Occupied', 'flag' => 'media/flags/palestine.svg','phone_code'=>'970'],
            ['code' => 'PA', 'name' => 'Panama', 'flag' => 'media/flags/panama.svg','phone_code'=>'507'],
            ['code' => 'PG', 'name' => 'Papua New Guinea', 'flag' => 'media/flags/papua-new-guinea.svg','phone_code'=>'675'],
            ['code' => 'PY', 'name' => 'Paraguay', 'flag' => 'media/flags/paraguay.svg','phone_code'=>'595'],
            ['code' => 'PE', 'name' => 'Peru', 'flag' => 'media/flags/peru.svg','phone_code'=>'51'],
            ['code' => 'PH', 'name' => 'Philippines', 'flag' => 'media/flags/philippines.svg','phone_code'=>'63'],
            ['code' => 'PL', 'name' => 'Poland', 'flag' => 'media/flags/poland.svg','phone_code'=>'48'],
            ['code' => 'PT', 'name' => 'Portugal', 'flag' => 'media/flags/portugal.svg','phone_code'=>'351'],
            ['code' => 'PR', 'name' => 'Puerto Rico', 'flag' => 'media/flags/puerto-rico.svg','phone_code'=>'1'],
            ['code' => 'QA', 'name' => 'Qatar', 'flag' => 'media/flags/qatar.svg','phone_code'=>'974'],
            ['code' => 'RO', 'name' => 'Romania', 'flag' => 'media/flags/romania.svg','phone_code'=>'40'],
            ['code' => 'RU', 'name' => 'Russian Federation', 'flag' => 'media/flags/russia.svg','phone_code'=>'7'],
            ['code' => 'RW', 'name' => 'Rwanda', 'flag' => 'media/flags/rwanda.svg','phone_code'=>'250'],
            ['code' => 'BL', 'name' => 'Saint Barthélemy', 'flag' => 'media/flags/st-barts.svg','phone_code'=>'590'],
            ['code' => 'KN', 'name' => 'Saint Kitts and Nevis', 'flag' => 'media/flags/saint-kitts-and-nevis.svg','phone_code'=>'1'],
            ['code' => 'LC', 'name' => 'Saint Lucia', 'flag' => 'media/flags/st-lucia.svg','phone_code'=>'1'],
            ['code' => 'MF', 'name' => 'Saint Martin (French part)', 'flag' => 'media/flags/sint-maarten.svg','phone_code'=>'590'],
            ['code' => 'PM', 'name' => 'Saint Pierre and Miquelon', 'flag' => 'media/flags/saint-pierre.svg','phone_code'=>'508'],
            ['code' => 'VC', 'name' => 'Saint Vincent and the Grenadines', 'flag' => 'media/flags/st-vincent-and-the-grenadines.svg','phone_code'=>'1'],
            ['code' => 'WS', 'name' => 'Samoa', 'flag' => 'media/flags/samoa.svg','phone_code'=>'685'],
            ['code' => 'SM', 'name' => 'San Marino', 'flag' => 'media/flags/san-marino.svg','phone_code'=>'378'],
            ['code' => 'ST', 'name' => 'Sao Tome and Principe', 'flag' => 'media/flags/sao-tome-and-prince.svg','phone_code'=>'239'],
            ['code' => 'SA', 'name' => 'Saudi Arabia', 'flag' => 'media/flags/saudi-arabia.svg','phone_code'=>'966'],
            ['code' => 'SN', 'name' => 'Senegal', 'flag' => 'media/flags/senegal.svg','phone_code'=>'221'],
            ['code' => 'RS', 'name' => 'Serbia', 'flag' => 'media/flags/serbia.svg','phone_code'=>'381'],
            ['code' => 'SC', 'name' => 'Seychelles', 'flag' => 'media/flags/seychelles.svg','phone_code'=>'248'],
            ['code' => 'SL', 'name' => 'Sierra Leone', 'flag' => 'media/flags/sierra-leone.svg','phone_code'=>'232'],
            ['code' => 'SG', 'name' => 'Singapore', 'flag' => 'media/flags/singapore.svg','phone_code'=>'65'],
            ['code' => 'SX', 'name' => 'Sint Maarten (Dutch part)', 'flag' => 'media/flags/sint-maarten.svg','phone_code'=>'721'],
            ['code' => 'SK', 'name' => 'Slovakia', 'flag' => 'media/flags/slovakia.svg','phone_code'=>'421'],
            ['code' => 'SI', 'name' => 'Slovenia', 'flag' => 'media/flags/slovenia.svg','phone_code'=>'386'],
            ['code' => 'SB', 'name' => 'Solomon Islands', 'flag' => 'media/flags/solomon-islands.svg','phone_code'=>'677'],
            ['code' => 'SO', 'name' => 'Somalia', 'flag' => 'media/flags/somalia.svg','phone_code'=>'252'],
            ['code' => 'ZA', 'name' => 'South Africa', 'flag' => 'media/flags/south-africa.svg','phone_code'=>'27'],
            ['code' => 'KR', 'name' => 'South Korea', 'flag' => 'media/flags/south-korea.svg','phone_code'=>'82'],
            ['code' => 'SS', 'name' => 'South Sudan', 'flag' => 'media/flags/south-sudan.svg','phone_code'=>'211'],
            ['code' => 'ES', 'name' => 'Spain', 'flag' => 'media/flags/spain.svg','phone_code'=>'34'],
            ['code' => 'LK', 'name' => 'Sri Lanka', 'flag' => 'media/flags/sri-lanka.svg','phone_code'=>'94'],
            ['code' => 'SD', 'name' => 'Sudan', 'flag' => 'media/flags/sudan.svg','phone_code'=>'249'],
            ['code' => 'SR', 'name' => 'Suriname', 'flag' => 'media/flags/suriname.svg','phone_code'=>'597'],
            ['code' => 'SZ', 'name' => 'Swaziland', 'flag' => 'media/flags/swaziland.svg','phone_code'=>'268'],
            ['code' => 'SE', 'name' => 'Sweden', 'flag' => 'media/flags/sweden.svg','phone_code'=>'46'],
            ['code' => 'CH', 'name' => 'Switzerland', 'flag' => 'media/flags/switzerland.svg','phone_code'=>'41'],
            ['code' => 'SY', 'name' => 'Syrian Arab Republic', 'flag' => 'media/flags/syria.svg','phone_code'=>'963'],
            ['code' => 'TW', 'name' => 'Taiwan, Province of China', 'flag' => 'media/flags/taiwan.svg','phone_code'=>'886'],
            ['code' => 'TJ', 'name' => 'Tajikistan', 'flag' => 'media/flags/tajikistan.svg','phone_code'=>'992'],
            ['code' => 'TZ', 'name' => 'Tanzania, United Republic of', 'flag' => 'media/flags/tanzania.svg','phone_code'=>'255'],
            ['code' => 'TH', 'name' => 'Thailand', 'flag' => 'media/flags/thailand.svg','phone_code'=>'66'],
            ['code' => 'TG', 'name' => 'Togo', 'flag' => 'media/flags/togo.svg','phone_code'=>'228'],
            ['code' => 'TK', 'name' => 'Tokelau', 'flag' => 'media/flags/tokelau.svg','phone_code'=>'690'],
            ['code' => 'TO', 'name' => 'Tonga', 'flag' => 'media/flags/tonga.svg','phone_code'=>'676'],
            ['code' => 'TT', 'name' => 'Trinidad and Tobago', 'flag' => 'media/flags/trinidad-and-tobago.svg','phone_code'=>'868'],
            ['code' => 'TN', 'name' => 'Tunisia', 'flag' => 'media/flags/tunisia.svg','phone_code'=>'216'],
            ['code' => 'TR', 'name' => 'Turkey', 'flag' => 'media/flags/turkey.svg','phone_code'=>'90'],
            ['code' => 'TM', 'name' => 'Turkmenistan', 'flag' => 'media/flags/turkmenistan.svg','phone_code'=>'993'],
            ['code' => 'TC', 'name' => 'Turks and Caicos Islands', 'flag' => 'media/flags/turks-and-caicos.svg','phone_code'=>'1'],
            ['code' => 'TV', 'name' => 'Tuvalu', 'flag' => 'media/flags/tuvalu.svg','phone_code'=>'688'],
            ['code' => 'UG', 'name' => 'Uganda', 'flag' => 'media/flags/uganda.svg','phone_code'=>'256'],
            ['code' => 'UA', 'name' => 'Ukraine', 'flag' => 'media/flags/ukraine.svg','phone_code'=>'380'],
            ['code' => 'AE', 'name' => 'United Arab Emirates', 'flag' => 'media/flags/united-arab-emirates.svg','phone_code'=>'971'],
            ['code' => 'GB', 'name' => 'United Kingdom', 'flag' => 'media/flags/united-kingdom.svg','phone_code'=>'44'],
            ['code' => 'US', 'name' => 'United States', 'flag' => 'media/flags/united-states.svg','phone_code'=>'1'],
            ['code' => 'UY', 'name' => 'Uruguay', 'flag' => 'media/flags/uruguay.svg','phone_code'=>'598'],
            ['code' => 'UZ', 'name' => 'Uzbekistan', 'flag' => 'media/flags/uzbekistan.svg','phone_code'=>'998'],
            ['code' => 'VU', 'name' => 'Vanuatu', 'flag' => 'media/flags/vanuatu.svg','phone_code'=>'678'],
            ['code' => 'VE', 'name' => 'Venezuela, Bolivarian Republic of', 'flag' => 'media/flags/venezuela.svg','phone_code'=>'58'],
            ['code' => 'VN', 'name' => 'Vietnam', 'flag' => 'media/flags/vietnam.svg','phone_code'=>'84'],
            ['code' => 'VI', 'name' => 'Virgin Islands', 'flag' => 'media/flags/virgin-islands.svg','phone_code'=>'1'],
            ['code' => 'YE', 'name' => 'Yemen', 'flag' => 'media/flags/yemen.svg','phone_code'=>'967'],
            ['code' => 'ZM', 'name' => 'Zambia', 'flag' => 'media/flags/zambia.svg','phone_code'=>'260'],
            ['code' => 'ZW', 'name' => 'Zimbabwe', 'flag' => 'media/flags/zimbabwe.svg','phone_code'=>'263'],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert($country);
        }
    }
}
