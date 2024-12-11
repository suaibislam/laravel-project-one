<?php

if (!function_exists('scriptStripper')) {
    /**
     * Removes <script> tags from the input string but preserves the content inside.
     *
     * @param string $input
     * @return string
     */
    function scriptStripper($input)
    {
        // Decode HTML entities to handle cases like &lt;script&gt;
        $decodedInput = html_entity_decode($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Remove regular <script> tags but keep the content inside
        $decodedInput = preg_replace('#<script(.?)>(.?)</script>#is', '$2', $decodedInput);

        // Remove any remaining HTML encoded <script> tags but keep the content inside
        $decodedInput = preg_replace('#&lt;script(.?)&gt;(.?)&lt;/script&gt;#is', '$2', $decodedInput);

        // Return the sanitized content
        return $decodedInput;
    }
}
