<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;



$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$twig = Twig::create(__DIR__ . '/../templates', ['cache' => false, 'debug' => true]);
$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    
    $seo = [
        'title' => 'Shine Gupta - Data Scientist',
        'description' => 'Data Scientist and Machine Learning Engineer specializing in AI, deep learning, and NLP. I enhance software with prompt engineering and fine-tuning, build AI-powered solutions, and optimize data extraction processes. My portfolio features projects in chronic disease monitoring and cybercrime prediction, showcasing skills in Python, LLMs, RAG, and MLOps.',
        'keywords' => 'Data Scientist, Machine Learning Engineer, AI, Deep learning, NLP, LLMs, RAG, MLOps, Python, C++, SQL, React, Next.js, FastAPI, Docker, Prompt Engineering','MCP','Computer Vision','Selenium',
        'author' => 'Shine Gupta',
        'url' => 'https://Shine-resume.onrender.com',
        'image' => 'https://' . $_SERVER['HTTP_HOST'] . '/assets/images/profile.webp',
        'type' => 'profile',
        'locale' => 'en_US',
        'site_name' => 'Shine Gupta\'s Resume'
    ];
    
    $workExperience = [
        [
            'company' => 'Turing',
            'url' => 'https://turing.com/',
            'position' => 'Data Scientist',
            'period' => 'Oct 2023 - Present',
            'description' => 'Data Scientist at Turing, specializing in AI and machine learning solutions for software performance enhancement.',
            'details' => [
                'Enhanced LLM-driven software performance, increasing multi-turn conversation quality by 35% using prompt engineering and response tuning. Built internal dev tools using Python, Postgres, and Neo4j for scalable evaluations and experimentation',
            ],
            'tags' => ['Transformers', 'FastAPI', 'PostgreSQL', 'Git', 'Docker', 'JavaScript']
        ],
        [
            'company' => 'DRDO',
            'url' => 'https://www.drdo.gov.in/',
            'position' => 'Research Trainee',
            'period' => 'Jan 2025 - May 2025',
            'description' => 'Research Trainee at India\'s premier defense research organization working on AI and knowledge management systems.',
            'details' => [
                'Leveraged web scraping to extract and process 50,000+ data points from the DRDO website creating a comprehensive knowledge based for the AI customer support agent.',
                'Built an AI knowledge assistant with RAG pipelines (LangChain + LLMs) and automated DRDO content processing',
                'Deployed via Docker, integrated APIs, and implemented full logging/debug layers with Git and Bash'
            ],
            'tags' => ['Python', 'LangChain', 'RAG', 'Docker', 'LLMs', 'Web Scraping']
        ],
        [
            'company' => 'Business Quant',
            'url' => 'http://businessquant.com/',
            'position' => 'Machine Learning Engineer',
            'period' => 'Jun 2023 - Sept 2024',
            'description' => 'Machine Learning Engineer at a financial technology company focused on automated data extraction and NLP solutions.',
            'details' => [
                'Improved PaddleOCR extraction precision by 20% by fine-tuning models on currency-specific datasets created using NLTK and openAI.',
                'Applied custom NLP parsing algorithms on financial reports to automate metrics extraction, cutting time by 30%'
            ],
            'tags' => ['Python', 'PaddleOCR', 'NLTK', 'NLP', 'Machine Learning']
        ],
        [
            'company' => 'Gradstem',
            'url' => 'https://www.gradstem.com/',
            'position' => 'Data Scientist',
            'period' => 'July 2024 - Nov 2024',
            'description' => 'Data Scientist at a software development company specializing in AI solutions and automation.',
            'details' => [
                'Developed AI-based autonomous agents for form-filling and chatbot applications using NLP techniques',
                'Integrated AI solutions for business use cases, streamlining automated processes and reducing manual efforts.'
            ],
            'tags' => ['Python', 'Selenium', 'NLTK', 'NLP', 'Machine Learning','puppeteer', 'AI Agents', 'Git', 'Docker', 'Kubernetes', 'MLOps', 'LLMs', 'RAG', 'Prompt Engineering']
        ],
        [
            'company' => 'Drifko',
            'url' => '#',
            'position' => 'AI/ML Developer',
            'period' => 'April 2024 - July 2024',
            'description' => 'AI/ML Developer at a startup focused on AI-driven solutions for business automation and data processing.',
            'details' => [
                'Designed and implemented chatbots using Rasa and Chainlit frameworks, leveraging large language models (LLMs)
to facilitate natural and intuitive user interactions.',
            ],
            'tags' => ['Python', 'Rasa', 'Chainlit', 'NLP', 'Machine Learning', 'LLMs', 'Docker', 'Git']
        ]
        
    ];
    
    $skills = [
        'Python', 'C/C++', 'MySQL', 'PostgreSQL', 'JavaScript', 'MongoDB', 
        'React', 'Next.js', 'Node.js', 'Flask', 'FastAPI',
        'scikit-learn', 'PyTorch', 'TensorFlow', 'Transformers', 'XGBoost', 
        'LLMs', 'RAG', 'MLOps', 'AI Agents', 'Git', 'Docker', 'Kubernetes', 'MCP','Slenium', 'OpenCV', 'TTS APIs', 'Prompt Engineering', 'Computer Vision'
    ];
    
    $sideProjects = [
        [
            'name' => 'CareMate',
            'url' => 'https://github.com/Shine-5705/CareMate',
            'description' => 'AI-Powered Chronic Disease Monitoring & Remote Care system using health sensors + LLMs to generate personalized health insights',
            'Github' => 'https://github.com/Shine-5705/CareMate-AI-Powered-Chronic-Disease-Monitoring-Remote-Care',
            'technologies' => ['OpenCV', 'Raspberry Pi', 'Arduino', 'TTS APIs', 'LLMs', 'Transformers','Computer Vision', 'Python', 'Flask', 'Docker'],
            'active' => true
        ],
        [
            'name' => 'CyberRakshak',
            'url' => 'https://github.com/dorkydhruv/Cyber-Rakshak',
            'description' => 'AI-based Cybercrime Prediction System with 82% accuracy, integrating real-time risk scoring. Winner of Innotech 2023 Award',
            'Github' => 'https://github.com/dorkydhruv/Cyber-Rakshak',
            'technologies' => ['Machine Learning', 'Deep Learning', 'TensorFlow', 'Keras', 'Flask', 'Flutter', 'Firebase', 'Python'],
            'active' => true
        ],
        [
            'name' => 'AutoAttend_Gmeet',
            'url' => 'https://youtu.be/qDpPLjahspM',
            'description' => 'Developed an automation tool to auto-join Google Meet, monitor captions, detect name mentions, and sync emoji reactions in real-time using Playwright.',
            'Github' => 'https://github.com/Shine-5705/AutoAttend_Gmeet',
            'technologies' => ['Playwright', 'Deep Learning', 'Chromium', 'JSON & TXT logging for transcripts', 'FastAPI', 'Docker', 'Python'],
            'active' => true
        ],
        [
            'name' => 'CSV Summarizer & Emailer',
            'url' => 'https://csv-summarizer-emailer.onrender.com/',
            'description' => 'Built a Streamlit application to analyze CSV data, generate AI-powered summaries with Mistral, and send insights via email with PDF and CSV attachments.',
            'Github' => 'https://github.com/Shine-5705/csv-monitor-summarizer',
            'technologies' => ['Streamlit', 'Deep Learning', 'Mistral API', 'Gmail SMTP', 'FastAPI', 'Docker', 'Python','wkhtmltopdf','Render'],
            'active' => true
        ],
        [
            'name' => 'India Art, Culture & Tourism Dashboard',
            'url' => 'https://youtu.be/qDpPLjahspM',
            'description' => 'Developed a data-driven Streamlit dashboard with Snowflake integration to showcase India’s cultural heritage, analyze tourism patterns, and promote responsible tourism through interactive visualizations.',
            'Github' => 'https://github.com/Shine-5705/bharat-culture-tourism-analytics',
            'technologies' => ['Streamlit', 'Machine Learning', 'PyDeck', 'Snowflake', 'Government tourism & culture datasets', 'Docker', 'Python', 'Git', 'FastAPI'],
            'active' => true
        ],
        [
            'name' => 'LinkedIn Auto Connect Agent',
            'url' => 'https://github.com/Shine-5705/Connect_over_LinkedIN',
            'description' => 'Built a Selenium-powered LinkedIn automation agent with a Streamlit interface to search, filter, and auto-connect with professionals while securely managing credentials and logging interactions.',
            'Github' => 'https://github.com/Shine-5705/Connect_over_LinkedIN',
            'technologies' => ['Streamlit', 'Machine Learning', 'Selenium', 'Docker', 'Python', 'GitHub', 'FastAPI'],
            'active' => true
        ],
        [
            'name' => 'Real Time Violence Detection',
            'url' => 'https://github.com/Shine-5705/Real-Time-Violence-Detection',
            'description' => 'Developed a real-time violence detection system using a Vision Transformer (ViViT) model integrated with Twilio to trigger automated calls and SMS alerts when violence is detected through a live camera feed.',
            'Github' => 'https://github.com/Shine-5705/Real-Time-Violence-Detection',
            'technologies' => ['ViViT', 'OpenCV', 'TensorFlow', 'Docker', 'Python', 'GitHub', 'Twilio API'],
            'active' => true
        ]               
        
           
    ];
    
    $education = [
        [
            'institution' => 'KIET Group of Institutions',
            'period' => 'November 2022 - June 2026',
            'degree' => 'Bachelor of Technology in Information Technology (GPA: 9)'
        ],
        [
            'institution' => 'CJ DAV Centenary School (CBSE)',
            'period' => 'April 2021 - July 2022',
            'degree' => 'Senior Secondary (95.8%)'
        ]
    ];
    
    $data = [
        'seo' => $seo,
        'profile' => [
            'name' => 'Shine Gupta',
            'description' => 'Data Scientist and Machine Learning Engineer specializing in AI, deep learning, and NLP.',
            'location' => 'Ghaziabad, Uttar Pradesh, India',
            'about' => 'Data Scientist and Machine Learning Engineer specializing in AI, deep learning, and NLP. I enhance software with prompt engineering and fine-tuning, build AI-powered solutions, and optimize data extraction processes.'
        ],
        'workExperience' => $workExperience,
        'skills' => $skills,
        'sideProjects' => $sideProjects,
        'education' => $education
    ];
    
    return $view->render($response, 'index.twig', $data);
});

$app->get('/{path:.*}', function ($request, $response, $args) {
    return $response->withHeader('Location', '/')->withStatus(302);
});

$app->run();