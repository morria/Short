<SearchSuggestion version="2.0" xmlns="http://opensearch.org/searchsuggest2">
  <Query xml:space="preserver"><?= $query ?></Query>
  <Section>
    <?php foreach ($suggestions as $i => $suggestion) { ?>
        <Item>
          <Text xml:space="preserve"><?= $suggestion['short_url'] ?></Text>
          <Url xml:space="preserve">http://go/<?= $suggestion['short_url'] ?></Url>
        </Item>
    <?php } ?>
  </Section>
</SearchSuggestion>
