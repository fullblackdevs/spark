'use-client';

import { Button } from 'flowbite-react';
import PropTypes from 'prop-types';

export default function SparkButton({ btnName }) {
  return (
    <Button className="mr-2">
      {btnName}
    </Button>
  );
}

SparkButton.propTypes = {
  btnName: PropTypes.string.isRequired,
};

