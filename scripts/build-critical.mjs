import {existsSync} from 'node:fs';
import {rename, rm, writeFile} from 'node:fs/promises';
import {fileURLToPath} from 'node:url';
import {generate} from 'critical';

const root = fileURLToPath(new URL('../', import.meta.url));
const chrome = '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';

// Penthouse's bundled Chromium predates Apple Silicon support.
if (!process.env.PUPPETEER_EXECUTABLE_PATH && process.platform === 'darwin' && existsSync(chrome)) {
  process.env.PUPPETEER_EXECUTABLE_PATH = chrome;
}

const output = new URL('../critical.css.php', import.meta.url);
const temporary = new URL(`../critical.css.php.${process.pid}.tmp`, import.meta.url);

try {
  const response = await fetch('https://josh.blog/about-me');
  if (!response.ok) {
    throw new Error(`Failed to fetch page: HTTP ${response.status}`);
  }

  const {css} = await generate({
    base: root,
    html: await response.text(),
    css: ['style.css'],
    width: 1300,
    height: 900,
  });
  if (!css.trim()) {
    throw new Error('Critical CSS generation returned empty output');
  }

  await writeFile(temporary, css);
  await rename(temporary, output);
  console.log('Updated critical.css.php');
} catch (error) {
  console.error(error);
  process.exitCode = 1;
} finally {
  await rm(temporary, {force: true});
}
