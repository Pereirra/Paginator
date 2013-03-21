<?php
class DefaultView implements ViewInterface {
	public function render(Paginator $paginator, $routeGenerator, array $options = array()) {
		$options = array_merge(array(
			'previous_text' => 'Previous',
			'next_text' => 'Next',
			'css_disabled_class' => 'disabled',
			'css_dots_class' => 'dots',
			'css_current_class' => 'current',
			), $options);

		$currentPage = $paginator->getCurrentPage();
		$startPage = 1;
		$endPage = $paginator->getNumPages();

		$pages = array();

		//whether there is previous page or not
		if ($paginator->hasPreviousPage()) {
			$pages[] = array($paginator->getPreviousPage(), $options['previous_text']);
		} else {
			$pages[] = sprintf('<span class="%s">%s</span>',
						$options['css_disabled_class'], $options['previous_text']);
		}

		for ($page = $startPage; $page <= $endPage; $page++) {
			if ($page = $currentPage) {
				$pages[] = sprintf('<span class="%s">%s</span>',
							$options['css_current_class'], $page);
			} else {
				$pages[] = array($page, $page);
			}
		}
		//whether there is next page or not
		if ($paginator->hasNextPage()) {
            $pages[] = array($paginator->getNextPage(), $options['next_text']);
        } else {
            $pages[] = sprintf('<span class="%s">%s</span>', $options['css_disabled_class'], $options['next_text']);
        }

        //deal with page's url
        $pagesHtml = '';
        foreach ($pages as $page) {
            if (is_string($page)) {
                $pagesHtml .= $page;
            } else {
                $pagesHtml .= '<a href="'.$routeGenerator($page[0]).'">'.$page[1].'</a>';
            }
        }

        return '<nav>' . $pagesHtml . '</nav>';
	}

	public function getViewName() {
		return 'default';
	}
}
?>