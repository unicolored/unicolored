// matching one level down:
// 'test/spec/{,*/}*.js'
// recursively match all subfolders:
// 'test/spec/**/*.js'
module.exports = function( grunt ) {
    'use strict';
    // Module qui affiche le temps d'éxécution de chaque tâche.
    // Utile pour détecter des anomalies et vérifier la performance des tâches.
    require( 'time-grunt' )( grunt );
    // Mozjpeg est un compresseur d'images
    // Il est utilisé par le plugin grunt-imagemin pour compresser les jpeg.
    var mozjpeg = require( 'imagemin-mozjpeg' );
    //var jpegRecompress = require( 'imagemin-jpeg-recompress' );
    //var jpegoptim = require( 'imagemin-jpegoptim' );
    // Config
    grunt.initConfig( {
        /*************************************************************************************************************************************************/
        pkg: grunt.file.readJSON( 'package.json' ),
        //////////// Project settings
        gh: {
            /* VARIABLES DU PROJET */
            app: require( './bower.json' ).appPath || '',
            themename: 'Unicolored',
            themeuri: 'https://www.unicolored.com',
            themeauthor: 'Gilles Hoarau',
            themeauthoruri: 'https://www.unicolored.com',
            themetemplate: 'bodyrock',
            themetextdomain: 'rock-unicolored',
            /* PATHS */
            mainsitepath: 'htdocs/',
            contentpath: 'htdocs/wp-content/',
            themepath: 'htdocs/wp-content/themes/rock-unicolored/',
            relativethemepath: 'wp-content/themes/rock-unicolored/',
            libspath: 'bower_components/',
            assetspath: 'htdocs/devassets/',
            devpath: 'dev/',
            temppath: 'tmp/',
            /* ASSETS */
            htmlAssets: [ '<%= gh.temppath %>html/front-page.html' ],
            cssFonts: [ '<%= gh.temppath %>fonts/font1.css', '<%= gh.temppath %>fonts/font2.css', '<%= gh.temppath %>fonts/font3.css' ],
            jsAssets: [ '<%= gh.devpath %>js/unicolored.js' ],
            jsScripts: [ '<%= gh.devpath %>js/scripts/analytics.js' ],
            iconsSet: '<%= gh.libspath %>elusive-iconfont/css/elusive-webfont.css'
        },
        humans_txt: {
            externalFile: {
                options: {
                    intro: 'Bonjour, ça va ?',
                    commentStyle: 'u',
                    content: grunt.file.readJSON( 'humans.json' ),
                    includeUpdateIn: 'string',
                },
                dest: 'htdocs/humans.txt',
            },
        },
        /*
        ##          ###     ######   ######  ######## ########  ######
        ##         ## ##   ##    ## ##    ## ##          ##    ##    ##
        ##        ##   ##  ##       ##       ##          ##    ##
        ##       ##     ##  ######   ######  ######      ##     ######
        ##       #########       ##       ## ##          ##          ##
        ##       ##     ## ##    ## ##    ## ##          ##    ##    ##
        ######## ##     ##  ######   ######  ########    ##     ######
        */
        /*
        ########   ## ##       ######   ######   ######
        ##         ## ##      ##    ## ##    ## ##    ##
        ##       #########    ##       ##       ##
        ######     ## ##      ##        ######   ######
        ##       #########    ##             ##       ##
        ##         ## ##      ##    ## ##    ## ##    ##
        ########   ## ##       ######   ######   ######
        */
        /*************************************************************************************************************************************************/
        // GENERATION DU CSS
        less: {
            options: {
                compress: false,
                yuicompress: false,
            },
            style: {
                files: {
                    '<%= gh.assetspath %>css/style.css': '<%= gh.devpath %>less/style.less',
                }
            },
        },
        /*
        ########   ## ##       ######  ##     ## ########  ##
        ##         ## ##      ##    ## ##     ## ##     ## ##
        ##       #########    ##       ##     ## ##     ## ##
        ######     ## ##      ##       ##     ## ########  ##
        ##       #########    ##       ##     ## ##   ##   ##
        ##         ## ##      ##    ## ##     ## ##    ##  ##
        ########   ## ##       ######   #######  ##     ## ########
        */
        // DEBUG // BACKGROUND
        curl: {
            fonts1: {
                dest: '<%= gh.assetspath %>fonts/font1.css',
                src: 'https://fonts.googleapis.com/css?family=Share+Tech'
            },
            fonts2: {
                dest: '<%= gh.assetspath %>fonts/font2.css',
                src: 'https://fonts.googleapis.com/css?family=Open+Sans:800italic,400,800,300'
            },
            fonts3: {
                dest: '<%= gh.assetspath %>fonts/font3.css',
                src: 'https://fonts.googleapis.com/css?family=Roboto:400italic,100,700italic,700,100italic,400'
            },
            gravatar: {
                dest: '<%= gh.devpath %>img/ico/gravatar.jpg',
                src: 'https://www.gravatar.com/avatar/9a424bfbb842ed0e00426d5470f09be3?s=120'
            },
            ga: {
                dest: '<%= gh.devpath %>js/tmp/analytics.js',
                src: 'https://www.google-analytics.com/analytics.js'
            }
        },
        // AUTOPREFIXER
        autoprefixer: {
            options: {
                browsers: [ 'last 2 versions', 'ie 8', 'ie 9' ]
            },
            theme: {
                src: '<%= gh.assetspath %>css/style.css',
                dest: '<%= gh.assetspath %>css/theme.ap.css'
            },
        },
        // MINIFICATION
        cssmin: {
            style: {
                options: {
                    banner: '/*\nTheme Name: <%= gh.themename %>\nTheme URI: <%= gh.themeuri %>\nDescription: <%= pkg.description %>\nAuthor: <%= gh.themeauthor %>\nAuthorURI: <%= gh.themeauthoruri %>\nTemplate: <%= gh.themetemplate %>\nVersion: <%= pkg.version %>\nText Domain: <%= gh.themetextdomain %>\n*/'
                },
                files: {
                    '<%= gh.themepath %>style.css': [ '<%= gh.assetspath %>fonts/font1.css', '<%= gh.assetspath %>fonts/font2.css', '<%= gh.assetspath %>fonts/font3.css', '<%= gh.assetspath %>css/icons.ap.css', '<%= gh.devpath %>css/bower-concat.css', '<%= gh.assetspath %>css/theme.ap.css' ]
                }
            }
        },
        /*
        ########   ## ##            ##  ######
        ##         ## ##            ## ##    ##
        ##       #########          ## ##
        ######     ## ##            ##  ######
        ##       #########    ##    ##       ##
        ##         ## ##      ##    ## ##    ##
        ########   ## ##       ######   ######
        */
        /*************************************************************************************************************************************************/
        // NORMALISE le code pour un développement plus aisé
        jsbeautifier: {
            options: {
                js: {
                    spaceInParen: true,
                    wrapLineLength: 0,
                    preserveNewlines: false,
                    keepArrayIndentation: true,
                    keepFunctionIndentation: true,
                }
            },
            default: {
                src: [ '<%= gh.devpath %>js/**/*.js' ],
            },
            test: {
                src: [ 'test/spec/{,*/}*.js' ],
            },
            grunt: {
                src: [ 'Gruntfile.js' ]
            }
        },
        jshint: {
            options: {
                reporter: require( 'jshint-stylish' ),
            },
            //beforeconcat: '<%= gh.jsAssets %>',
            all: [ '<%= gh.devpath %>js/{angular}/*.js' ],
            grunt: [ 'Gruntfile.js' ],
            apps: [ '<%= gh.mainsitepath %>apps/{,*/}*.js' ]
        },
        ngAnnotate: {
            options: {
                singleQuotes: true,
            },
            app1: {
                files: {
                    '<%= gh.devpath %>js/tmp/unicolored.js': [ '<%= gh.devpath %>js/unicolored.js' ],
                    '<%= gh.devpath %>js/tmp/bower-concat.js': [ '<%= gh.devpath %>js/tmp/bower-concat.js' ]
                }
            }
        },
        uglify: {
            options: {
                preserveComments: 'some'
            },
            my_target: {
                files: {
                    '<%= gh.themepath %>js/scripts.min.js': [ '<%= gh.devpath %>js/tmp/bower-concat.js', '<%= gh.themepath %>js/scripts.js' ],
                }
            },
        },
        /*
        ########   ## ##       ######   #######  ##    ##  ######     ###    ########
        ##         ## ##      ##    ## ##     ## ###   ## ##    ##   ## ##      ##
        ##       #########    ##       ##     ## ####  ## ##        ##   ##     ##
        ######     ## ##      ##       ##     ## ## ## ## ##       ##     ##    ##
        ##       #########    ##       ##     ## ##  #### ##       #########    ##
        ##         ## ##      ##    ## ##     ## ##   ### ##    ## ##     ##    ##
        ########   ## ##       ######   #######  ##    ##  ######  ##     ##    ##
        */
        /*************************************************************************************************************************************************/
        // STATIC
        // Concaténation devant être appellée par sécurité avant un build
        bower_concat: {
            all: {
                dest: '<%= gh.devpath %>js/tmp/bower-concat.js',
                // je ne charge pas les css de bower actuellement
                cssDest: '<%= gh.devpath %>css/bower-concat.css',
                exclude: [ 'angular', 'angular-mocks', 'angular-scenario' ],
                /*dependencies: {
                    'angular-animate': 'angular',
                },*/
                bowerOptions: {
                    relative: false
                }
                /*,
                                mainFiles: {
                                    'angular-animate': [ 'angular-animate.min.js' ]
                                }*/
            },
        },
        // CONCATENATION JS
        concat: {
            options: {
                separator: ' ',
                stripBanners: true,
                banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("dd-mm-yyyy") %> [FR] */',
                process: function( src, filepath ) {
                    return '\n//####' + filepath + '\n' + src;
                },
                nonull: true,
            },
            dist: {
                files: {
                    '<%= gh.themepath %>js/scripts.js': [ '<%= gh.devpath %>js/tmp/unicolored.js' ]
                }
            },
        },
        /*
        ########   ## ##      #### ##     ##    ###     ######   ########  ######
        ##         ## ##       ##  ###   ###   ## ##   ##    ##  ##       ##    ##
        ##       #########     ##  #### ####  ##   ##  ##        ##       ##
        ######     ## ##       ##  ## ### ## ##     ## ##   #### ######    ######
        ##       #########     ##  ##     ## ######### ##    ##  ##             ##
        ##         ## ##       ##  ##     ## ##     ## ##    ##  ##       ##    ##
        ########   ## ##      #### ##     ## ##     ##  ######   ########  ######
        */
        /*************************************************************************************************************************************************/
        // OPTIMISATION D'IMAGES
        imagemin: { // Task
            dynamic: { // Another target
                options: {
                    optimizationLevel: 3,
                    svgoPlugins: [ {
                        removeViewBox: false
      } ],
                    use: [ mozjpeg() ]
                },
                files: [ {
                    expand: true, // Enable dynamic expansion
                    cwd: '<%= gh.devpath %>img/', // Src matches are relative to this path
                    src: [ '**/*.{png,jpg,gif,ico,svg}' ], // Actual patterns to match
                    dest: '<%= gh.themepath %>img/' // Destination path prefix
    } ]
            },
            uploads: { // Another target
                options: {
                    optimizationLevel: 3,
                    svgoPlugins: [ {
                        removeViewBox: false
      } ],
                    use: [ mozjpeg() ]
                },
                files: [ {
                    expand: true, // Enable dynamic expansion
                    cwd: '<%= gh.contentpath %>uploads/', // Src matches are relative to this path
                    src: [ '**/*.{png,jpg,gif,ico,svg}' ], // Actual patterns to match
                    dest: '<%= gh.temppath %>uploads/' // Destination path prefix
    } ]
            }
        },
        webp: {
            uploads: {
                options: {
                    //binpath: 'C:/Users/Administrator/AppData/Roaming/npm/node_modules/webp-bin/bin',
                    binpath: 'C:/Program Files (x86)/Webp/bin/cwebp',
                    preset: 'photo',
                    verbose: true,
                    quality: 70,
                    alphaQuality: 70,
                    compressionMethod: 4,
                    segments: 4,
                    psnr: 42,
                    sns: 50,
                    filterStrength: 0,
                    filterSharpness: 3,
                    simpleFilter: true,
                    partitionLimit: 50,
                    analysisPass: 6,
                    multiThreading: true,
                    lowMemory: false,
                    alphaMethod: 0,
                    alphaFilter: 'best',
                    alphaCleanup: true,
                    noAlpha: false,
                    lossless: false,
                    force: true
                },
                files: [ {
                    expand: true,
                    cwd: '<%= gh.temppath %>uploads/2014',
                    src: [ '**/*.jpg' ],
                    dest: '<%= gh.temppath %>uploads2/2014'
                } ]
            },
            images: {
                options: {
                    //binpath: 'C:/Users/Administrator/AppData/Roaming/npm/node_modules/webp-bin/bin',
                    binpath: 'C:/Program Files (x86)/Webp/bin/cwebp',
                    preset: 'default',
                    verbose: true,
                    quality: 80,
                    alphaQuality: 70,
                    compressionMethod: 3,
                    segments: 4,
                    psnr: 42,
                    sns: 50,
                    filterStrength: 0,
                    filterSharpness: 3,
                    //simpleFilter: true,
                    partitionLimit: 50,
                    analysisPass: 6,
                    multiThreading: true,
                    lowMemory: false,
                    alphaMethod: 0,
                    alphaFilter: 'best',
                    alphaCleanup: true,
                    noAlpha: false,
                    lossless: true,
                    force: true
                },
                files: [ {
                    expand: true,
                    cwd: '<%= gh.themepath %>img/',
                    src: [ '**/*.{jpg,png,gif,ico}' ],
                    dest: '<%= gh.themepath %>img/'
    } ],
            }
        },
        /*
        ########   ## ##      ##     ## ######## ##     ## ##
        ##         ## ##      ##     ##    ##    ###   ### ##
        ##       #########    ##     ##    ##    #### #### ##
        ######     ## ##      #########    ##    ## ### ## ##
        ##       #########    ##     ##    ##    ##     ## ##
        ##         ## ##      ##     ##    ##    ##     ## ##
        ########   ## ##      ##     ##    ##    ##     ## ########
        */
        /*************************************************************************************************************************************************/
        exec: {
            front: 'curl -k https://www.unicolored.com/ > <%= gh.temppath %>html/front-page.html'
        },
        prettify: {
            options: {
                indent: 4,
                indent_char: ' ',
                wrap_line_length: 78,
                brace_style: 'expand',
                //unformatted: [ 'a', 'sub', 'sup', 'b', 'i', 'u' ]
                unformatted: [ 'php' ]
            },
            p404: {
                src: '<%= gh.themepath %>404.php',
                dest: '<%= gh.themepath %>404.php',
            }
        },
        htmlhint: {
            options: {
                'tag-pair': true, // Tag must be paired.
                'tagname-lowercase': true, //Tagname must be lowercase.
                'attr-lowercase': true,
                'attr-value-double-quotes': true,
                'attr-value-not-empty': true,
                'attr-no-duplication': true,
                'doctype-first': true,
                'doctype-html5': true,
                'tag-self-close': true,
                'spec-char-escape': true,
                'id-unique': true,
                'src-not-empty': true,
                //Perfomance
                'head-script-disabled': true,
                'img-alt-require': true,
                'id-class-value': true,
                'style-disabled': true,
                'space-tab-mixed-disabled': true,
                'id-class-ad-disabled': true, // Id and class can not use ad keyword, it will blocked by adblock software.
                'href-abs-or-rel': false,
                'attr-unsafe-chars': true,
            },
            html1: {
                src: '<%= gh.htmlAssets %>'
            }
        },
        /*
        ########   ## ##      ##     ##    ###    ##       #### ########     ###    ######## ####  #######  ##    ##
        ##         ## ##      ##     ##   ## ##   ##        ##  ##     ##   ## ##      ##     ##  ##     ## ###   ##
        ##       #########    ##     ##  ##   ##  ##        ##  ##     ##  ##   ##     ##     ##  ##     ## ####  ##
        ######     ## ##      ##     ## ##     ## ##        ##  ##     ## ##     ##    ##     ##  ##     ## ## ## ##
        ##       #########     ##   ##  ######### ##        ##  ##     ## #########    ##     ##  ##     ## ##  ####
        ##         ## ##        ## ##   ##     ## ##        ##  ##     ## ##     ##    ##     ##  ##     ## ##   ###
        ########   ## ##         ###    ##     ## ######## #### ########  ##     ##    ##    ####  #######  ##    ##
        */
        /*************************************************************************************************************************************************/
        validation: {
            options: {
                reset: grunt.option( 'reset' ) || false,
                stoponerror: true,
                doctype: 'HTML5',
                charset: 'utf-8',
            },
            files: {
                src: '<%= gh.htmlAssets %>'
            }
        },
        pagespeed: {
            options: {
                nokey: true,
                url: "https://www.unicolored.com"
            },
            gh: {
                options: {
                    url: "https://www.unicolored.com/",
                    locale: "fr_FR",
                    strategy: "desktop",
                    threshold: 80
                }
            }
        },
        /*
        ########   ## ##      ######## ########  ######  ########  ######
        ##         ## ##         ##    ##       ##    ##    ##    ##    ##
        ##       #########       ##    ##       ##          ##    ##
        ######     ## ##         ##    ######    ######     ##     ######
        ##       #########       ##    ##             ##    ##          ##
        ##         ## ##         ##    ##       ##    ##    ##    ##    ##
        ########   ## ##         ##    ########  ######     ##     ######
        */
        /*************************************************************************************************************************************************/
        // Test settings
        karma: {
            unit: {
                configFile: 'test/karma.conf.js',
                singleRun: true
            }
        },
        /*
        ########   ## ##       ######  ##       ########    ###    ##    ##
        ##         ## ##      ##    ## ##       ##         ## ##   ###   ##
        ##       #########    ##       ##       ##        ##   ##  ####  ##
        ######     ## ##      ##       ##       ######   ##     ## ## ## ##
        ##       #########    ##       ##       ##       ######### ##  ####
        ##         ## ##      ##    ## ##       ##       ##     ## ##   ###
        ########   ## ##       ######  ######## ######## ##     ## ##    ##
        */
        /*************************************************************************************************************************************************/
        // Empties folders to start fresh
        clean: {
            serve: {
                src: [ "<%= gh.temppath %>*", "<%= gh.libspath %>**/*.md", "<%= gh.libspath %>**/*LICENSE", "<%= gh.libspath %>**/*.txt", "<%= gh.libspath %>**/*.json", "<%= gh.libspath %>**/*.hbs", "<%= gh.libspath %>**/*.gzip", "<%= gh.libspath %>**/*.map", "<%= gh.libspath %>**/*.coffee", "<%= gh.libspath %>**/CHANGES", "<%= gh.libspath %>**/Makefile", ]
            },
            images: {
                src: [ "<%= gh.themepath %>img/**/*.jpg", "<%= gh.themepath %>img/**/*.png", "<%= gh.themepath %>img/**/*.gif", "<%= gh.themepath %>img/**/*.ico", "<%= gh.themepath %>img/**/*.webp" ]
            },
            changelog: {
                src: [ "./CHANGELOG.md" ]
            },
            screenshots: {
                src: [ "./dev/screenshots/**/*.png" ]
            },
            dev: {
                src: [ "./htdocs/wp-content/themes/rock-unicolored/dev" ]
            },
            webapp: {
                src: [ "./htdocs/manifest.webapp", "./htdocs/offline.appcache" ]
            }
        },
        /*
        ########   ## ##      ########  ######## ########  ##        #######  ##    ##
        ##         ## ##      ##     ## ##       ##     ## ##       ##     ##  ##  ##
        ##       #########    ##     ## ##       ##     ## ##       ##     ##   ####
        ######     ## ##      ##     ## ######   ########  ##       ##     ##    ##
        ##       #########    ##     ## ##       ##        ##       ##     ##    ##
        ##         ## ##      ##     ## ##       ##        ##       ##     ##    ##
        ########   ## ##      ########  ######## ##        ########  #######     ##
        */
        /*************************************************************************************************************************************************/
        // DIST
        changelog: {
            options: {
                // Task-specific options go here.
            }
        },
        gitpush: {
            originmaster: {
                options: {
                    verbose: true,
                    remote: 'gandi',
                    //cwd: "ssh+git://133080@git.dc0.gpaas.net"
                }
            }
        },
        // DEPLOY
        sshconfig: {
            "myhost": grunt.file.readJSON( 'myhost.json' ),
        },
        sshexec: {
            deploy: {
                command: 'deploy www.unicolored.com.git',
                options: {
                    config: 'myhost'
                }
            }
        },
        /*************************************************************************************************************************************************/
        /*************************************************************************************************************************************************/
        /*************************************************************************************************************************************************/
        /*
        ########   ## ##      ##      ##    ###    ########  ######  ##     ##
        ##         ## ##      ##  ##  ##   ## ##      ##    ##    ## ##     ##
        ##       #########    ##  ##  ##  ##   ##     ##    ##       ##     ##
        ######     ## ##      ##  ##  ## ##     ##    ##    ##       #########
        ##       #########    ##  ##  ## #########    ##    ##       ##     ##
        ##         ## ##      ##  ##  ## ##     ##    ##    ##    ## ##     ##
        ########   ## ##       ###  ###  ##     ##    ##     ######  ##     ##
        */
        // SURVEILLANCE
        // WATCH : Cette tâche en appelle d'autres dès qu'elle détecte des changements sur les fichiers définis
        // Watches files for changes and runs tasks based on the changed files
        watch: {
            options: {
                nospawn: true,
                livereload: true // activation du reload
            },
            // Gruntfile.js mise à jour, je reload
            mygruntfile: {
                options: {
                    livereload: false // activation du reload
                },
                files: [ 'Gruntfile.js' ],
                tasks: [ 'jshint:grunt', 'jsbeautifier:grunt' ],
            },
            // STYLES
            lessEdited: { // Au changement d'un fichier .less, on appelle la tâche de compilation
                files: [ '<%= gh.devpath %>less/{,*/,*/*/}*.less' ],
                tasks: [ 'less:style' ],
            },
            // VIEWS
            views: { // Au changement d'un fichier .less, on appelle la tâche de compilation
                files: [ '<%= gh.devpath %>js/views/{,*/,*/*/}*.html' ],
                //tasks: [ 'less:style', 'cssmin:devtheme' ],
            },
            // SCRIPTS
            scriptsEdited: {
                options: {
                    nospawn: true,
                    livereload: true // activation du reload
                },
                // Au changement d'un fichier .less, on appelle la tâche de compilation
                files: [ '<%= gh.devpath %>js/{,angular/}*.js', 'test/spec/{,*/}*.js' ], // which files to watch
                tasks: [ 'reloadJs' ],
            },
            // LIVERELOAD : fichiers modifiés qui n'appellent pas d'autres tâches que le reload
            livereload: {
                files: [ '<%= gh.themepath %>{,*/}*.php', 'htdocs/.htaccess' ]
            }
        },
        /*
        ########   ## ##       ######   #######  ##    ## ##    ## ########  ######  ########
        ##         ## ##      ##    ## ##     ## ###   ## ###   ## ##       ##    ##    ##
        ##       #########    ##       ##     ## ####  ## ####  ## ##       ##          ##
        ######     ## ##      ##       ##     ## ## ## ## ## ## ## ######   ##          ##
        ##       #########    ##       ##     ## ##  #### ##  #### ##       ##          ##
        ##         ## ##      ##    ## ##     ## ##   ### ##   ### ##       ##    ##    ##
        ########   ## ##       ######   #######  ##    ## ##    ## ########  ######     ##
        */
        /*************************************************************************************************************************************************/
        // SERVEUR : configuration de connect
        connect: {
            options: { // Port 8000 par défaut
                protocol: 'https',
                port: 9000,
                hostname: 'www.unicolored.com',
                livereload: 35729,
                base: '',
                //key: grunt.file.read( 'monserveur.key' ).toString(),
                //cert: grunt.file.read( 'certificate-96884.crt' ).toString()
            },
            livereload: {
                options: {
                    open: 'https://www.unicolored.com/',
                    //open:true,
                    //protocol: 'https',
                    base: '<%= gh.dist %>',
                    //key: grunt.file.read( 'monserveur.key' ),
                    //cert: grunt.file.read( 'certificate-96884.crt' )
                }
            },
            test: {
                options: {
                    port: 9001,
                    middleware: function( connect ) {
                        return [
                            connect.static( '.tmp' ),
                            connect.static( 'test' ),
                            connect().use( '/bower_components', connect.static( './bower_components' ) ),
                            connect.static( 'htdocs/' )
                        ];
                    }
                }
            },
        },
        phantom: {
            options: {
                port: 4444
            },
            your_target: {
                src: 'https://www.unicolored.com'
            }
        },
        /*
        ########   ## ##         ###    ##     ## ########  #######   ######  ##     ##  #######  ########
        ##         ## ##        ## ##   ##     ##    ##    ##     ## ##    ## ##     ## ##     ##    ##
        ##       #########     ##   ##  ##     ##    ##    ##     ## ##       ##     ## ##     ##    ##
        ######     ## ##      ##     ## ##     ##    ##    ##     ##  ######  ######### ##     ##    ##
        ##       #########    ######### ##     ##    ##    ##     ##       ## ##     ## ##     ##    ##
        ##         ## ##      ##     ## ##     ##    ##    ##     ## ##    ## ##     ## ##     ##    ##
        ########   ## ##      ##     ##  #######     ##     #######   ######  ##     ##  #######     ##
        */
        /*************************************************************************************************************************************************/
        autoshot: {
            default_options: {
                options: {
                    // necessary config
                    path: '<%= gh.devpath %>screenshots/',
                    // optional config, must set either remote or local
                    remote: {
                        files: [ {
                            src: "https://www.unicolored.com/",
                            dest: "front-page.png"
                        } ],
                    },
                    local: {
                        path: './tmp/html/', // path to directory of the webpage
                        port: 8080, // port of startup http server
                        files: [ // local filename and screenshot filename
                            {
                                src: "front-page.html",
                                dest: "test.jpg",
                                delay: 3000
                            }
                        ]
                    },
                    viewport: [ '320x480', '1366x768', '1922x1200' /*, '480x854', '768x1024', '992x992', '1600x1200', '1922x1200'*/ ]
                },
            },
        },
        /*************************************************************************************************************************************************/
        /*************************************************************************************************************************************************/
        /*************************************************************************************************************************************************/
        /*
        ########   ## ##       ######   #######  ########  ##    ##
        ##         ## ##      ##    ## ##     ## ##     ##  ##  ##
        ##       #########    ##       ##     ## ##     ##   ####
        ######     ## ##      ##       ##     ## ########     ##
        ##       #########    ##       ##     ## ##           ##
        ##         ## ##      ##    ## ##     ## ##           ##
        ########   ## ##       ######   #######  ##           ##
        */
        // BODYROCK
        copy: {
            changelog: {
                files: [
                    // makes all src relative to cwd
                    {
                        src: 'CHANGELOG.md',
                        dest: 'changelogs/CHANGELOG-<%= pkg.version %>.md'
                    },
                ],
            },
            versioning: {
                files: [
              // makes all src relative to cwd
                    {
                        src: '<%= gh.themepath %>style.css',
                        dest: '<%= gh.themepath %>style.<%= pkg.version %>.css',
                      },
                    {
                        src: '<%= gh.themepath %>js/scripts.min.js',
                        dest: '<%= gh.themepath %>js/scripts.<%= pkg.version %>.min.js',
                      },
              ],
            },
            versioningImg: {
                files: [
              // makes all src relative to cwd
                    {
                        src: '<%= gh.devpath %>img/ico/logo.svg',
                        dest: '<%= gh.devpath %>img/ico/logo.<%= pkg.version %>.svg',
              },
                    {
                        src: '<%= gh.devpath %>img/ico/gravatar.jpg',
                        dest: '<%= gh.devpath %>img/ico/gravatar.<%= pkg.version %>.jpg',
              },
                    {
                        src: '<%= gh.devpath %>img/ico/favicon.ico',
                        dest: '<%= gh.devpath %>img/ico/favicon.<%= pkg.version %>.ico',
              },
                    {
                        src: '<%= gh.devpath %>img/ico/144.png',
                        dest: '<%= gh.devpath %>img/ico/144.<%= pkg.version %>.png',
              },
                    {
                        src: '<%= gh.devpath %>img/ico/16.png',
                        dest: '<%= gh.devpath %>img/ico/16.<%= pkg.version %>.png',
              },
                    {
                        src: '<%= gh.devpath %>img/ico/48.png',
                        dest: '<%= gh.devpath %>img/ico/48.<%= pkg.version %>.png',
              },
                    {
                        src: '<%= gh.devpath %>img/ico/128.png',
                        dest: '<%= gh.devpath %>img/ico/128.<%= pkg.version %>.png',
              }
              ],
            },
            yesimlocal: {
                files: [
              // makes all src relative to cwd
                    {
                        src: 'yesimlocal.php',
                        dest: '<%= gh.devpath %>yesimlocal.php',
              }
              ],
            },
            webapp: {
                files: [
              // makes all src relative to cwd
                    {
                        src: 'manifest.webapp',
                        dest: 'htdocs/manifest.webapp',
              },
                    {
                        src: 'offline.appcache',
                        dest: 'htdocs/offline.appcache',
              },
              ],
            },
        },
        /*
        ##         ## ##       ######  ##    ## ##     ## ##       #### ##    ## ##    ##
        ##         ## ##      ##    ##  ##  ##  ###   ### ##        ##  ###   ## ##   ##
        ##       #########    ##         ####   #### #### ##        ##  ####  ## ##  ##
        ##         ## ##       ######     ##    ## ### ## ##        ##  ## ## ## #####
        ##       #########          ##    ##    ##     ## ##        ##  ##  #### ##  ##
        ##         ## ##      ##    ##    ##    ##     ## ##        ##  ##   ### ##   ##
        ########   ## ##       ######     ##    ##     ## ######## #### ##    ## ##    ##
        */
        symlink: {
            // Enable overwrite to delete symlinks before recreating them
            options: {
                overwrite: true
            },
            // The "build/target.txt" symlink will be created and linked to
            // "source/target.txt". It should appear like this in a file listing:
            // build/target.txt -> ../source/target.txt
            /*
            explicit: {
              src: 'source/target.txt',
              dest: 'build/target.txt'
            },*/
            // These examples using "expand" to generate src-dest file mappings:
            // http://gruntjs.com/configuring-tasks#building-the-files-object-dynamically
            dev: {
                files: [
            // All child files and directories in "source", starting with "foo-" will
            // be symlinked into the "build" directory, with the leading "source"
            // stripped off.

                    {
                        expand: true,
                        overwrite: false,
                        cwd: 'dev',
                        src: [ '*' ],
                        dest: 'htdocs/wp-content/themes/rock-unicolored/dev'
            },
            // All child directories in "source" will be symlinked into the "build"
            // directory, with the leading "source" stripped off.
            /*
            {
              expand: true,
              overwrite: false,
              cwd: 'dev',
              src: ['*'],
              dest: 'htdocs/wp-content/themes/rock-unicolored/dev',
              filter: 'isDirectory'
            }*/
            ]
            },
        }
    } );
    /*************************************************************************************************************************************************/
    /*************************************************************************************************************************************************/
    /*************************************************************************************************************************************************/
    /*************************************************************************************************************************************************/
    /*************************************************************************************************************************************************/
    /*************************************************************************************************************************************************/
    /*
    ########   ## ##      ##     ## ########  ######     ########    ###     ######  ##     ## ########  ######
    ##         ## ##      ###   ### ##       ##    ##       ##      ## ##   ##    ## ##     ## ##       ##    ##
    ##       #########    #### #### ##       ##             ##     ##   ##  ##       ##     ## ##       ##
    ######     ## ##      ## ### ## ######    ######        ##    ##     ## ##       ######### ######    ######
    ##       #########    ##     ## ##             ##       ##    ######### ##       ##     ## ##             ##
    ##         ## ##      ##     ## ##       ##    ##       ##    ##     ## ##    ## ##     ## ##       ##    ##
    ########   ## ##      ##     ## ########  ######        ##    ##     ##  ######  ##     ## ########  ######
    */
    // Import des modules inclus dans package.json
    require( 'load-grunt-tasks' )( grunt );
    // TESTS
    grunt.registerTask( 'test', [ 'connect:test', 'karma' ] );
    // TRANSITION dev/prod
    grunt.registerTask( 'dev', function( target ) {
        switch ( target ) {
            default:
            /*
            Preparation du mode développement
            - copie du fichier yesimlocal.php dans /dev/
            - suppression du manifest.xml et du .appcache dans /htdocs/
            */
                grunt.task.run( [ 'clean:webapp', 'symlink:dev' ] );
            break;
            case 'prod':
                /*
                Préparation du mode production
                - suppression du fichier imlocal.php dans /dev/
                - copie des fichiers manifest.xml et .appcache dans /htdocs/
                */
                    grunt.task.run( [ 'clean:dev', 'copy:webapp' ] );
                break;
        }
    } );
    // MES TACHES
    grunt.registerTask( 'reloadFonts', function( target ) {
        grunt.task.run( [ 'curl:fonts1', 'curl:fonts2', 'curl:fonts3' ] );
    } );
    grunt.registerTask( 'reloadCss', function( target ) {
        grunt.task.run( [ 'less', 'autoprefixer:theme', 'cssmin' ] );
    } );
    grunt.registerTask( 'reloadJs', function( target ) {
        grunt.task.run( [ 'curl:ga', 'jsbeautifier', 'jshint', 'ngAnnotate', 'concat', 'uglify' ] );
    } );
    grunt.registerTask( 'reloadImg', function( target ) {
        grunt.task.run( [ 'curl:gravatar', 'clean:images', 'copy:versioningImg', 'imagemin:dynamic', 'webp:images' ] );
    } );
    grunt.registerTask( 'reloadHtml', function( target ) {
        grunt.task.run( [ 'exec', 'prettify', 'htmlhint', 'validation', 'pagespeed' ] );
    } );
    grunt.registerTask( 'responsive', function( target ) {
        grunt.task.run( [ 'clean:screenshots', 'autoshot' ] );
    } );
    ///// ETAPE DE RELEASE
    grunt.registerTask( 'release', function( target ) {
        grunt.task.run( [ 'humans_txt', 'reloadFonts', 'reloadCss', 'bower_concat', 'reloadJs', 'copy:versioningImg', 'reloadImg' /*, 'reloadHtml'*/ , 'pagespeed', 'copy:changelog', 'clean:changelog', 'changelog', 'copy:versioning', 'dev:prod' ] );
    } );
    grunt.registerTask( 'production', function( target ) {
        grunt.task.run( [ 'release' ] );
    } );
    grunt.registerTask( 'optimize', function() {
        grunt.option( 'force', true );
        grunt.task.run( [ 'newer:imagemin:uploads', 'newer:webp:uploads' ] );
    } );
    // CLEAN, COMMIT, TAG, PUSH, DEPLOY
    grunt.registerTask( 'push', function( target ) {
        grunt.log.warn( 'Preparation de l\'envoi...' );
        grunt.task.run( [ 'gitpush:originmaster', 'sshexec:deploy' ] );
    } );
    // CREER UN SERVEUR persistant avec connect et livereload
    grunt.registerTask( 'serve', function( target ) {
        grunt.task.run( [ 'connect:livereload', 'watch' ] );
    } );
    // TACHE PAR DEFAUT
    grunt.registerTask( 'default', [ 'serve' ] );
};
