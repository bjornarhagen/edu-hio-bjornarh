<?php require_once('../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        ol {
            list-style-type: lower-latin;
        }

        ol li {
            line-height: 200%;
        }

        ol li:hover {
            font-weight: 700;
        }

        ol li span {
            display: inline-block;
            min-width: 50px;
        }

        ol li span.eq {
            text-align: center;
        }

        ol li span.bin {
            letter-spacing: 5px;
        }

        ol li span.bin:first-child {
            min-width: 125px;
        }

        ol li table {
            display: inline-block;
            vertical-align: top;
            margin-bottom: 25px;
        }

        ol li table tr {
            line-height: 200%;
        }

        ol li table tr td {
            padding: 0 5px;
            text-align: right;
        }

        ol li table tr:last-child td {
            border-top: 1px solid black;
            border-bottom: 4px double black;
        }
    </style>
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
                                    <td>-</td>
                                    <td>0010</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>100</td>
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
                                    <td>1110</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>1111</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>0001</td>
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
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>2000</td>
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
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>+</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>=</td>
                                    <td>2000</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ol>
            </section>
        </section>
    </article>
    <?php require_once('../../../templates/footer.php'); ?>
</body>
</html>