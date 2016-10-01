<?php require_once('../../../templates/head.php'); ?>
<link rel="stylesheet" href="<?= $path; ?>/css/number-systems.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body class="article light">
    <?php require_once('../../../templates/nav.php'); ?>
    <article class="medium">
        <header>
            <h1>Tallsystemer</h1>
            <p>
                Denne øvelsen består av oppgaver som dere skal arbeide med samtidig som dere studerer modulen: Digitale
                maskiner og binære tall 
            </p>
        </header>
        <section>
            <header>
                <h2>Gjør om desimal tallene til binære:</h2>
            </header>
            <section>
                <ol>
                    <li>
                        <span class="dec">4</span>
                        <span class="eq">=</span>
                        <span class="bin">100</span>
                    </li>
                    <li>
                        <span class="dec">17</span>
                        <span class="eq">=</span>
                        <span class="bin">10001</span>
                    </li>
                    <li>
                        <span class="dec">34</span>
                        <span class="eq">=</span>
                        <span class="bin">100010</span>
                    </li>
                    <li>
                        <span class="dec">128</span>
                        <span class="eq">=</span>
                        <span class="bin">10000000</span>
                    </li>
                    <li>
                        <span class="dec">255</span>
                        <span class="eq">=</span>
                        <span class="bin">11111111</span>
                    </li>
                </ol>
            </section>
        </section>
        <section>
            <header>
                <h2>Gjør om de binære tallene til desimal og heksadesimal</h2>
            </header>
            <section>
                <ol>
                    <li>
                        <span class="bin">1010</span>
                        <span class="eq">=</span>
                        <span class="dec">10</span>
                        <span class="eq">=</span>
                        <span class="hex">A</span>
                    </li>
                    <li>
                        <span class="bin">101011001</span>
                        <span class="eq">=</span>
                        <span class="dec">345</span>
                        <span class="eq">=</span>
                        <span class="hex">159</span>
                    </li>
                    <li>
                        <span class="bin">1010011</span>
                        <span class="eq">=</span>
                        <span class="dec">83</span>
                        <span class="eq">=</span>
                        <span class="hex">53</span>
                    </li>
                    <li>
                        <span class="bin">110110111</span>
                        <span class="eq">=</span>
                        <span class="dec">439</span>
                        <span class="eq">=</span>
                        <span class="hex">187</span>
                    </li>
                    <li>
                        <span class="bin">11111111</span>
                        <span class="eq">=</span>
                        <span class="dec">255</span>
                        <span class="eq">=</span>
                        <span class="hex">FF</span>
                    </li>
                </ol>
            </section>
        </section>
        <section>
            <header>
                <h2>Gjør om de heksadesimale tallene til desimal og binær</h2>
            </header>
            <section>
                <ol>
                    <li>
                        <span class="hex">8</span>
                        <span class="eq">=</span>
                        <span class="dec">8</span>
                        <span class="eq">=</span>
                        <span class="bin">1000</span>
                    </li>
                    <li>
                        <span class="hex">A5</span>
                        <span class="eq">=</span>
                        <span class="dec">165</span>
                        <span class="eq">=</span>
                        <span class="bin">10100101</span>
                    </li>
                    <li>
                        <span class="hex">FC</span>
                        <span class="eq">=</span>
                        <span class="dec">252</span>
                        <span class="eq">=</span>
                        <span class="bin">11111100</span>
                    </li>
                    <li>
                        <span class="hex">254</span>
                        <span class="eq">=</span>
                        <span class="dec">596</span>
                        <span class="eq">=</span>
                        <span class="bin">001001010100</span>
                    </li>
                    <li>
                        <span class="hex">D7A</span>
                        <span class="eq">=</span>
                        <span class="dec">3450</span>
                        <span class="eq">=</span>
                        <span class="bin">110101111010</span>
                    </li>
                </ol>
            </section>
        </section>
        <section>
            <header>
                <h2>Vis hvordan følgende utregninger blir utført binært i en datamaskin</h2>
            </header>
            <section>
                <ol>
                    <li>
                        <span class="dec">6 + 2</span>
                        <span class="eq">=</span>
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>0110</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>0010</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>1000</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <span class="dec">6 - 2</span>
                        <span class="eq">=</span>
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>0110</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>11110</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>0100</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <span class="dec">14 - 15</span>
                        <span class="eq">=</span>
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>01110</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>10001</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>11111</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <span class="dec">-3 + 7</span>
                        <span class="eq">=</span>
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>11101</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>0111</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>0100</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <span class="dec">-4 - 10</span>
                        <span class="eq">=</span>
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>11100</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>10110</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>10010</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ol>
            </section>
        </section>
        <section>
            <header>
                <h2>Vis hvordan tallet 3,56 tall blir lagret binært i en 32-biters flyttall (Intel)</h2>
            </header>
            <section>
                <p>3,56 er binært: 11,10001111010111</p>
                <p>3,56 = 11,10001111010111 = 1,110001111010111 E1</p>
                <p>Biased eksponent: 1 + 1111111 = 10000000</p>
                <p>Mantisse: 110001111010111</p>
                <p>Mantisse har 0 som fortegn</p>
                <table class="borders">
                    <tbody>
                        <tr>
                            <td>0</td>
                            <td>10000000</td>
                            <td>11000111101011100000000</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
        <footer>
            <hr>
            <h2>GRIT - 4 Datamaskinen</h2>
            <ul>
                <li><a href="laboppgave.php">Laboppgave</a></li>
                <li><a href="tallsystemer.php" class="subtle">Tallsystemer</a></li>
                <li><a href="kjenn-din-pc.php">Kjenn Din PC</a></li>
            </ul>
        </footer>
    </article>
    <?php require_once('../../../templates/footer.php'); ?>
</body>
</html>