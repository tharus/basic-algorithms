<?php

class longest_divisible_subsequence
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function largestDivisibleSubset($nums)
    {
        $n = count($nums);


        $dpArr = array_fill(0, $n, 1); // Initialize with length 1 for all elements
        $results = [];
        sort($nums);
        for ($i = 1; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$i] % $nums[$j] == 0 && $dpArr[$i] < $dpArr[$j] + 1) {
                    $dpArr[$i] = $dpArr[$j] + 1;
                    $results[$i] = $j;
                }

            }
        }

        $maxIndex = array_search(max($dpArr), $dpArr);
        $sub = [];
        while ($maxIndex !== null) {
            $sub[] = $nums[$maxIndex];
            $maxIndex = $results[$maxIndex];
        }

        return array_reverse($sub);
    }
}
