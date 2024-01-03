<?php

class longest_increasing_subsequence
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        $n = count($nums);
        if ($n === 0) {
            return 0; // Handle empty array
        }

        $lenArr = array_fill(0, $n, 1); // Initialize with length 1 for all elements

        for ($i = 1; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$i] > $nums[$j]) {
                    $lenArr[$i] = max($lenArr[$i], $lenArr[$j] + 1);
                }
            }
        }

        return max($lenArr);
    }
}

