<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class SimpleCommitNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Github\\Model\\SimpleCommit';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Github\\Model\\SimpleCommit';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Github\Model\SimpleCommit();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('tree_id', $data)) {
            $object->setTreeId($data['tree_id']);
        }
        if (\array_key_exists('message', $data)) {
            $object->setMessage($data['message']);
        }
        if (\array_key_exists('timestamp', $data)) {
            $object->setTimestamp(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['timestamp']));
        }
        if (\array_key_exists('author', $data) && $data['author'] !== null) {
            $object->setAuthor($this->denormalizer->denormalize($data['author'], 'Github\\Model\\SimpleCommitAuthor', 'json', $context));
        }
        elseif (\array_key_exists('author', $data) && $data['author'] === null) {
            $object->setAuthor(null);
        }
        if (\array_key_exists('committer', $data) && $data['committer'] !== null) {
            $object->setCommitter($this->denormalizer->denormalize($data['committer'], 'Github\\Model\\SimpleCommitCommitter', 'json', $context));
        }
        elseif (\array_key_exists('committer', $data) && $data['committer'] === null) {
            $object->setCommitter(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['id'] = $object->getId();
        $data['tree_id'] = $object->getTreeId();
        $data['message'] = $object->getMessage();
        $data['timestamp'] = $object->getTimestamp()->format('Y-m-d\\TH:i:sP');
        $data['author'] = $this->normalizer->normalize($object->getAuthor(), 'json', $context);
        $data['committer'] = $this->normalizer->normalize($object->getCommitter(), 'json', $context);
        return $data;
    }
}