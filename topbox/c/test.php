<?php
include_once('commoncontroller.php');

class test extends CommonController
{
	public function index()
	{
		$json = file_get_contents("data/file.json")	;
		$arr = json_decode($json);

		echo '<pre>';
		print_r($arr);
	}

	public function pri()
	{
		header('Content-Type:text/plain;charset=UTF-8');
		echo "
1. Typical of the grassland dwellers of the continent is the American antelope,or pronghorn.
1.美洲羚羊，或称叉角羚，是该大陆典型的草原动物。
2. Of the millions who saw Haley’s comet in 1986, how many people will live long enough to see it return in the twenty-first century.
2. 1986年看见哈雷慧星的千百万人当中，有多少人能够长寿到足以目睹它在二十一世纪的回归呢？
3. Anthropologists have discovered that fear, happiness, sadness, and surprise are universally reflected in facial expressions.
3.人类学家们已经发现，恐惧，快乐，悲伤和惊奇都会行之于色，这在全人类是共通的。
4. Because of its irritating effect on humans, the use of phenol as a generalantiseptic has been largely discontinued.
4.由于苯酚对人体带有刺激性作用，它基本上已不再被当作常用的防腐剂了。
5. In group to remain in existence, a profit-making organization must, in the long run, produce something consumers consider useful or desirable.
5.任何盈利组织若要生存，最终都必须生产出消费者可用或需要的产品。
6. The greater the population there is in a locality, the greater the need there is for water, transportation, and disposal of refuse.
6.一个地方的人口越多，其对水，交通和垃圾处理的需求就会越大。
7. It is more difficult to write simply, directly, and effectively than to employ flowery but vague expressions that only obscure one’s meaning.
7.简明，直接，有力的写作难于花哨，含混而意义模糊的表达。
8. With modern offices becoming more mechanized, designers are attempting to personalize them with warmer, less severe interiors.
8.随着现代办公室的日益自动化，设计师们正试图利用较为温暖而不太严肃的内部装饰来使其具有亲切感。
9. The difference between libel and slander is that libel is printed while slander is spoken.
9.诽谤和流言的区别在于前者是书面的，而后者是口头的。
10. The knee is the joints where the thigh bone meets the large bone of the lower leg.
10.膝盖是大腿骨和小腿胫的连接处。
11. Acids are chemical compounds that, in water solution, have a sharp taste, acorrosive action on metals, and the ability to turn certain blue vegetable dyes red.
11.酸是一种化合物，它在溶于水时具有强烈的气味和对金属的腐蚀性，并且能够使某些蓝色植物染料变红。
12. Billie Holiday’s reputation as a great jazz-blues singer rests on her ability to give emotional depth to her songs.
12. Billie Holiday’s作为一个爵士布鲁斯乐杰出歌手的名声建立在能够赋予歌曲感情深度的能力。
13. Essentially, a theory is an abstract, symbolic representation of what is conceived to be reality.
13.理论在本质上是对认识了的现实的一种抽象和符号化的表达。
14. Long before children are able to speak or understand a language, they communicate through facial expressions and by making noises.
14.儿童在能说或能听懂语言之前，很久就会通过面部表情和靠发出噪声来与人交流了。
15. Thanks to modern irrigation, crops now grow abundantly in areas where once nothing but cacti and sagebrush could live.
15.受当代灌溉(技术设施)之赐，农作物在原来只有仙人掌和荞属科植物才能生存的地方旺盛的生长。
16. The development of mechanical timepieces spurred the search for more accurate sundials with which to regulate them.
16.机械计时器的发展促使人们寻求更精确的日晷，以便校准机械计时器。
17. Anthropology is a science in that anthropologists use a rigorous set of methods and techniques to document observations that can be checked by others.
17.人类学是一门科学，因为人类学家采用一整套强有力的方法和技术来记录观测结果，而这样记录下来的观测结果是供他人核查的。
18. Fungi are important in the process of decay, which returns ingredients to the soil, enhances soil fertility, and decomposes animal debris.
18.真菌在腐化过程中十分重要，而腐化过程将化学物质回馈于土壤，提高其肥力，并分解动物粪便。
19. When it is struck, a tuning fork produces an almost pure tone, retaining its pitch over a long period of time.
19.音叉被敲击时，产生几乎纯质的音调，其音量经久不衰。
20. Although pecans are most plentiful in the southeastern part of the United States, they are found as far north as Ohio and Illinois.
20.虽然美洲山河桃树最集中于美国的东南部但是在北至俄亥俄州及伊利诺州也能看见它们。
21. Eliminating problems by transferring the blame to others is often called scape-goating.
21.用怪罪别人的办法来解决问题通常被称为寻找替罪羊。
22. The chief foods eaten in any country depend largely on what grows best in its climate and soil.
22.一个国家的主要食物是什么，大体取决于什么作物在其天气和土壤条件下生长得最好。
23. Over a very large number of trials, the probability of an event’s occurring is equal to the probability that it will not occur.
23.在大量的实验中，某一事件发生的几率等于它不发生的几率。
24. Most substance contract when they freeze so that the density of a substance’s solid is higher than the density of its liquid.
24.大多数物质遇冷收缩，所以他们的密度在固态时高于液态。
25. The mechanism by which brain cells store memories is not clearly understood.
25.大脑细胞储存记忆的机理并不为人明白。
26. By the middle of the twentieth century, painters and sculptors in the United States had begun to exert a great worldwide influence over art.
26.到了二十一世纪中叶，美国画家和雕塑家开始在世界范围内对艺术产生重大影响。
27. In the eastern part of New Jersey lies the city of Elizabeth, a major shipping and manufacturing center.
27.伊丽莎白市，一个重要的航运和制造业中心，坐落于新泽西州的东部。
28. Elizabeth Blackwell, the first woman medical doctor in the United States, founded the New York Infirmary, an institution that has always had a completely female medical staff.
28. Elizabeth Blackwell，美国第一个女医生，创建了员工一直为女性纽约诊所。
29. Alexander Graham Bell once told his family that he would rather be remembered as a teacher of the deaf than as the inventor of the telephone.
29. Alexander Graham Bell曾告诉家人，他更愿意让后人记住他是聋子的老师，而非电话的发明者。
30. Because its leaves remain green long after being picked, rosemary became associated with the idea of remembrance.
30.采摘下的迷迭香树叶常绿不衰，因此人们把迷迭香树与怀念联系在一起。
31. Although apparently rigid, bones exhibit a degree of elasticity that enables the skeleton to withstand considerable impact.
31.骨头看起来是脆硬的，但它也有一定的弹性，使得骨骼能够承受相当的打击。
32. That xenon could not FORM chemical compounds was once believed by scientists.
32.科学家曾相信：氙气是不能形成化合物的。
33. Research into the dynamics of storms is directed toward improving the ability to predict these events and thus to minimize damage and avoid loss of life.
33. 对风暴动力学的研究是为了提高风暴预测从而减少损失，避免人员伤亡。
34. The elimination of inflation would ensure that the amount of money used in repaying a loan would have the same value as the amount of money borrowed.
34.消除通货膨胀应确保还贷的钱应与所贷款的价值相同。
35. Futurism, an early twentieth-century movement in art, rejected all traditions and attempted to glorify contemporary life by emphasizing the machine and motion.
35.未来主义，二十世纪早期的一个艺术思潮。拒绝一切传统，试图通过强调机械和动态来美化生活。
36. One of the wildest and most inaccessible parts of the United States is the Everglades where wildlife is abundant and largely protected.
36. Everglades是美国境内最为荒凉和人迹罕至的地区之一，此处有大量的野生动植物而且大多受(法律)保护。
37. Lucretia Mott’s influence was so significant that she has been credited by some authorities as the originator of feminism in the United States.
37. Lucretia Mott’s的影响巨大，所以一些权威部门认定她为美国女权运动的创始人。
38. The activities of the international marketing researcher are frequently much broader than those of the domestic marketer.
38. 国际市场研究者的活动范围常常较国内市场研究者广阔。
39. The continental divide refers to an imaginary line in the North American Rockies that divides the waters flowing into the Atlantic Ocean from those flowing into the Pacific.
39. 大陆分水岭是指北美洛矶山脉上的一道想象线，该线把大西洋流域和太平洋流域区分开来。 
40. Studies of the gravity field of the Earth indicate that its crust and mantle yield when unusual weight is placed on them.
40. 对地球引力的研究表明，在不寻常的负荷之下地壳和地幔会发生位移。
41. The annual worth of Utah’s manufacturing is greater than that of its mining and farming combined.
41. 尤它州制造业的年产值大于其工业和农业的总和。
42. The wallflower is so called because its weak stems often grow on walls and along stony cliffs for support.
42. 墙花之所以叫墙花，是因为其脆弱的枝干经常要靠墙壁或顺石崖生长，以便有所依附。
43. It is the interaction between people, rather than the events that occur in their lives, that is the main focus of social psychology.
43. 社会心理学的主要焦点是人与人之间的交往，而不是他们各自生活中的事件。
44. No social crusade aroused Elizabeth Williams’ enthusiasm more than the expansion of educational facilities for immigrants to the United States.
44. 给美国的新移民增加教育设施比任何社会运动都更多的激发了Elizabeth Williams的热情。 
45. Quails typically have short rounded wings that enable them to spring into full flight instantly when disturbed in their hiding places.
45. 典型的鹌鹑都长有短而圆的翅膀，凭此他们可以在受惊时一跃而起，飞离它们的躲藏地。
46. According to anthropologists, the earliest ancestors of humans that stood upright resembled chimpanzees facially, with sloping foreheads and protruding brows.
46. 根据人类学家的说法，直立行走的人的鼻祖面部轮廓与黑猩猩相似，额头后倾，眉毛突出。 
47. Not until 1866 was the fully successful transatlantic cable finally laid.
47. 直到1866年第一条横跨大西洋的电缆才完全成功的架通。
48. In his writing, John Crowe Ransom describes what he considers the spiritual barrenness of society brought about by science and technology.
48. John Crowe Ransom在他的著作中描述了他认为是由科学技术给社会带来的精神贫困。
49. Children with parents whose guidance is firm, consistent, and rational are inclined to possess high levels of self-confidence.
49. 父母的教导如果坚定，始终如一和理性，孩子就有可能充满自信。
50. The ancient Hopewell people of North America probably cultivated corn and other crops, but hunting and gathering were still of critical importance in their economy.
50. 北美远古的Hopewell人很可能种植了玉米和其他农作物，但打猎和采集对他们的经济贸易仍是至关重要的。
";
	}

	public function findurl()
	{
		parent::init();	

		$rec = $this->_db->fetch_all_assoc("select * from roach_todo");

		$rules = array(
			"/http\:\/\/v\.youku\.com\/v_show\/id_.*\.html/",
			"/http\:\/\/game\.youku\.com\/index\/lol\/_page.*_.*\.html/",
			"/http\:\/\/www\.tudou\.com\/plcover\/.*\//",
			"/http\:\/\/v\.17173\.com\/lol\/.*\/index.shtml/",
			"/http\:\/\/www\.tudou\.com\/home\/.*\/item/",
			"/http\:\/\/i\.youku\.com\/u\/.*\/videos/",
			"/http\:\/\/game\.youku\.com\/index\/lol/",
			"/http\:\/\/x\.youku\.com\/tag\/lists\?t\=207/",
			"/http\:\/\/www\.tudou\.com\/list\/labeltop_540_124\.html/",
			"/http\:\/\/www\.tudou\.com\/home\/tudoulol\//",
			"/http\:\/\/v\.17173\.com\/lol\//",
			"/http\:\/\/v\.17173\.com\/list\-index\.html\?pac\=901\&ac\=.*\&v\=2\&page\=.*/",
			"/http\:\/\/v\.qq\.com\/cover\/6\/.*\.html/",
			"/http\:\/\/www\.soku\.com\/t\/npsearch\/LOL\//",
			);
		foreach($rec as $k=>$v)
		{
			$matched = false;
			foreach($rules as $kk=>$vv)
			{
				$ret = preg_match($vv,$v['url'], $matches);
				if($ret)
					$matched = true;
			}
			if(!$matched)
					echo $v['url'],"<br/>";

		}

		echo '<pre>';
		print_r($ret);
		return ;
	}
}

