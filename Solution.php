$input = [
            'item/id' => 'my_id',
            'item/title' => 'my_title',
            'item/group1/val1' => 'my_val1',
            'item/group1/val2' => 'my_val2',
            'summary' => 'xyz',
            'item/group1/val3' => 'my_val3',
        ];
        $result = [];

        foreach ($input as $k => $val) {
            $tags = explode('/', $k);
            $parent = [];

            foreach ($tags as $key => $tag) {
                $parentTag = &$result;
                foreach ($parent as $level) {
                    $parentTag = &$parentTag[$level];
                }

                if (!isset($parentTag[$tag]) && $key < count($tags) - 1) {
                    $parentTag[$tag] = [];
                    $parent[] = $tag;

                } elseif (isset($parentTag[$tag])) {
                    $parent[] = $tag;
                    continue;
                } else {
                    $parentTag[$tag] = $val;
                }
            }
        }
        
        print_r($result);
      
