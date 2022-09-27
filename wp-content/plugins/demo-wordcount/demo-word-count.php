<?php 

/*
Plugin Name:  Demo Word Count
Description:  A short demo word count plugin.
Version:      1.0
Author:       Andy E 
Text Domain:  wpdwc
Domain Path:  /languages
*/
class DemoWordCount
{
    public function wp_dp_follow_us($content) {
        // Only do this when a single post is displayed
        // if ( is_single() ) { 
            $content .= "
                <div class='demo'>Follow us on Twitter...</div>
            ";
        // }

        return $content;
    }


    public function wpCountWordsForContent($content) {
        $countWords = $this->getWordCount($content);

        $content .= "<hr />";
        foreach( $countWords as $word => $wordCount ) {
            $content .= sprintf("<div class='WordCounter' style='display:inline-block; background: #c0c0c0; margin-right:10px !important; padding:5px;'>");
                $content .= $word;
            $content .= "</div>";

        }
        $content .= "<hr />";

        return $content;
    }


    public function getWordCount($content): array {
        $content = strip_tags($content);

        $splitWords = $this->splitWords($content);
        $stopWords = $this->getStopWords();
        $countWords = $this->getWordCountArray( $splitWords, $stopWords );

        return $countWords;
    }


    public function splitWords(string $content): array {
        $content = str_replace( ["\n", "\r", "\t"], " ", $content);
        $content = str_replace([ "…", ",", ".", "!", "?", "(", ")", "[", "]", "%", ":" ], "", $content);
        $content = preg_replace('/[^\p{L}\p{N}\s]/u', '', $content);

        $tempWords = explode( " ", $content );

        $splitWords = array_map( function ($word) {
            return strtolower( trim( $word ) );
        }, $tempWords);

        return $splitWords;
    }


    public function getStopWords(): array {
        $stopWords = [
            "der", "die", "das", "den", "dem",
            "ich", "du", "er", "sie", "es",
            "ein", "eine", "einer", "einen", "einem",
            "auf", "unter", "über",
            "alle", "viele", "keine",
            "meine", "deine", "seine", "ihre", "unsere",
            "mein", "dein", "sein", "ihr", "ihn", "ihm", "unser",
            "bei", "oder", "und", "mit", "ohne",
            "sich", "da", "an", "in", "im", "bei", "von",
            "wird", "um", "dort", "für",
            "zu", "zum", "so", "wie"
        ];

        return $stopWords;
    }


    public function getWordCountArray(array $splitWords, array $stopWords): array {
        $countWords = [];
        foreach($splitWords as $word) {
            if( $word !== "" ) {
                if( in_array( $word, $stopWords ) !== false ) {
                    // ignore stop words
                    continue;
                }

                if(!isset( $countWords[$word] ) ) {
                    $countWords[$word] = 0;
                }
                $countWords[$word]++;
            }
        }

        return $countWords;
    }
}


$demoWordCount = new DemoWordCount();
// add_filter('the_content', [$demoWordCount, 'wp_dp_follow_us']);
add_filter('the_content', [$demoWordCount, 'wpCountWordsForContent']);