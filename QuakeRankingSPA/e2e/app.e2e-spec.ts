import { QuakeRankingPage } from './app.po';

describe('quake-ranking App', function() {
  let page: QuakeRankingPage;

  beforeEach(() => {
    page = new QuakeRankingPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
