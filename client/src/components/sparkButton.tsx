'use-client';

import { Button } from 'flowbite-react';   

import { SparkButtonProps } from '../customTypes';
import React from 'react';

export default function SparkButton({ btnName }: SparkButtonProps) {
  return (
    <Button className="mr-2">
      {btnName}
    </Button>
  );
}
