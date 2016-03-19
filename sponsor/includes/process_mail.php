<?php

$mailSent = false;
// Assume the input contains nothing suspect
$suspect = false;

// Regular expression to search for suspect phrases
$pattern = '/Content-type:|Bcc:|Cc:/i';

    //Gurmanprit Dhaliwal
    // recursive function checks phrases
    // third argument
    function isSuspect($value, $pattern, &$suspect)
    {
        if (is_array($value)) {
            foreach ($value as $item) {
                isSuspect($item, $pattern, $suspect);
            }
        } else {
            if (preg_match($pattern, $value)) {
                $suspect = true;
            }
        }
    }
    // bhecks the $_POST array 
    isSuspect($_POST, $pattern, $suspect);
    // process form if no supsect found
    if (!$suspect) :
        // Check that required fields have been filled in,
        // and reassign expected elements to simple variables
        foreach ($_POST as $key => $value)
        {
            $value = is_array($value) ? $value : trim($value);
            if (empty($value) && in_array($key, $required)) {
                $missing[] = $key;
                $$key = '';
            } elseif (in_array($key, $expected)) {
                $$key = $value;
            }
        }
        // validate email
        if (!$missing && !empty($email)) :
            $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if ($validemail)
            {
                $headers[] = "Reply-to: $validemail";
            } else {
                $errors['email'] = true;
            }
        endif;
        // no error creates header n body
        if (!$errors && !$missing) :
            $headers = implode("\r\n", $headers);
            // Initialize message
            $message = '';
            foreach ($expected as $field) :
                if (isset($$field) && !empty($$field))
                {
                    $val = $$field;
                } else {
                    $val = 'Not selected';
                }
                // makes comma seperated array
                if (is_array($val)) {
                    $val = implode(', ', $val);
                }
                // changes underscores to spaces 
                $field = str_replace('_', ' ', $field);
                $message .= ucfirst($field) . ": $val\r\n\r\n";
            endforeach;
            $message = wordwrap($message, 70);
            $mailSent = mail($to, $subject, $message, $headers, $authorized);
            if (!$mailSent) {
                $errors['mailfail'] = true;
            }
    endif;
endif;