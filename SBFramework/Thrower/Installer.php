<?php
include __CORE__ . "Thrower" .DIRECTORY_SEPARATOR. "Error.php";
set_error_handler(["\SBFramework\Thrower\Error","FrameErrorHandler"]);
set_exception_handler (["\SBFramework\Thrower\Error","FrameExceptionHandler"]);